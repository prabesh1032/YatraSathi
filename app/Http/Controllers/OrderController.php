<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Bookmark;
use App\Models\Package;
use App\Models\Guide;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // Store a new booking order
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'guide_id' => 'nullable|exists:guides,id', // Add validation for guide_id
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'nullable|integer|min:1',
            'num_people' => 'nullable|integer|min:1',
            'travel_date' => 'required|date|after:today', // Ensure num_people is valid
        ]);

        // Default the num_people to 1 if not provided
        $data['num_people'] = $request->input('num_people', 1);
        $data['duration'] = $request->input('duration', 1);

        // Additional data to be stored in the order
        $data['payment_method'] = "COD"; // Assuming COD payment, or modify as needed
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'Pending';
        $data['total_price'] = $request->price * $data['num_people'] * $data['duration'];

        // Create the order
        $order = Order::create($data);

        // Create a notification for the admin about the new booking
        Notification::create([
            'user_id' => auth()->id(),
            'type' => 'Booking',
            'content' => 'A new booking has been made by ' . auth()->user()->name . ' for the package ' . Package::find($data['package_id'])->name,
        ]);

        // Create a notification for the admin about the payment (assuming it's COD)
        Notification::create([
            'user_id' => auth()->id(),
            'type' => 'Payment',
            'content' => 'Payment of ' . $order->total_price . ' is due (COD) for the package ' . Package::find($data['package_id'])->name,
        ]);

        // Remove from bookmarks if it exists
        Bookmark::where('user_id', $data['user_id'])
            ->where('package_id', $data['package_id'])
            ->delete();

        // If a guide is assigned, send them an email
        if ($data['guide_id']) {
            $guide = Guide::find($data['guide_id']);
            $emailData = [
                'userName' => $data['name'],
                'userPhone' => $data['phone'],
                'userAddress' => $data['address'],
                'packageName' => Package::find($data['package_id'])->name, // Fetch package name
                'travelDate' => $data['travel_date'],
                'numPeople' => $data['num_people'],
                'totalPrice' => $data['total_price'],
                'guide' => $guide, // Pass the guide object to the email
            ];

            // Send email to guide
            Mail::send('emails.orderguidemail', $emailData, function ($message) use ($guide) {
                $message->to($guide->email, $guide->name)
                    ->subject('You have a new booking!');
            });
        }

        return redirect('/')->with('success', 'Booking has been placed successfully.');
    }

    public function index()
    {
        // Fetch orders with pagination (10 items per page)
        $orders = Order::latest()->paginate(12);
        // dd($orders);
        return view('orders.index', compact('orders'));
    }

    // Update the booking status
    public function status($id, $status)
    {
        $order = Order::with('package', 'guide')->findOrFail($id); // Include guide in the query
        $order->status = $status;
        $order->save();

        $emaildata = [
            'name' => $order->user->name,
            'status' => $status,
            'order' => $order,
            'package' => $order->package,
            'guide' => $order->guide, // Include guide details in the email data
            'payment_method' => $order->payment_method,
        ];

        // Send email notification
        Mail::send('emails.orderemail', $emaildata, function ($message) use ($order) {
            $message->to($order->user->email, $order->user->name)
                ->subject('Booking Status Update');
        });

        return back()->with('success', 'Booking status updated to ' . $status);
    }

    // Handle eSewa payment and booking confirmation
    public function storeEsewa(Request $request, $bookmarkid)
    {
        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data);
        $status = $data->status;

        if ($status === "COMPLETE") {
            // Find the bookmark
            $bookmark = Bookmark::find($bookmarkid);
            if (!$bookmark) {
                return redirect('/')->with('success', 'Booking completed via eSewa successfully.');
                // return redirect('/')->with('error', 'No corresponding bookmark found for the eSewa payment.');
            }

            // Create the order from bookmark data
            $order = new Order();
            $order->package_id = $bookmark->package_id;
            $order->total_price = $bookmark->total_price;
            $order->num_people = $bookmark->num_people;
            $order->duration = $bookmark->duration;
            $order->payment_method = "eSewa";
            $order->name = $bookmark->user->name;
            $order->phone = $bookmark->user->phone;
            $order->address = $bookmark->user->address;
            $order->travel_date = $request->input('travel_date');
            $order->guide_id = $bookmark->guide_id; // Assign guide_id from the bookmark
            $order->user_id = auth()->user()->id;
            $order->status = "Pending"; // Or set this to "Confirmed" based on your flow
            $order->save();

            // Delete the bookmark
            $bookmark->delete();

            // Send email confirmation to the user
            $emaildata = [
                'name' => $order->user->name,
                'status' => 'Pending',
                'order' => $order,
                'package' => $order->package,
                'guide' => $order->guide, // Include guide in the email
                'paymentMethod' => $order->payment_method,
            ];

            // Send confirmation email
            Mail::send('emails.orderemail', $emaildata, function ($message) use ($order) {
                $message->to($order->user->email, $order->user->name)
                    ->subject('Booking Confirmation');
            });

            // Create a notification for the admin about the new booking
            Notification::create([
                'user_id' => auth()->id(),
                'type' => 'Booking',
                'content' => 'A new booking has been made by ' . auth()->user()->name . ' for the package ' . Package::find($data->package_id)->name,
            ]);

            // Create a notification for the admin about the completed payment
            Notification::create([
                'user_id' => auth()->id(),
                'type' => 'Payment',
                'content' => 'Payment of ' . $order->total_price . ' has been completed by ' . auth()->user()->name . ' for the package ' . Package::find($data->package_id)->name . ' via eSewa.',
            ]);

            return redirect('/')->with('success', 'Booking completed via eSewa successfully.');
        }
        return redirect('/')->with('error', 'eSewa payment failed.');
    }

    public function userHistory()
    {
        $user = Auth::user(); // Get the authenticated user
        $orders = Order::where('user_id', $user->id)
            ->with('package', 'guide') // Include guide in the query
            ->latest()
            ->get(); // Fetch orders for the user

        return view('userhistory', compact('orders')); // Pass orders to the view
    }

    public function cancel($orderId)
    {
        // Retrieve the order by its ID
        $order = Order::findOrFail($orderId);

        // Check if the order belongs to the authenticated user
        if ($order->user_id != auth()->user()->id) {
            return redirect()->route('historyindex')->with('error', 'You are not authorized to cancel this booking.');
        }

        // Check if the cancellation is within 2 days of booking
        $orderDate = Carbon::parse($order->created_at);
        $currentDate = Carbon::now();
        $diffInDays = $orderDate->diffInDays($currentDate);

        if ($diffInDays <= 2) {
            // Send cancellation email before deleting the order
            $emaildata = [
                'name' => $order->user->name,
                'status' => 'Cancelled',
                'order' => $order,
                'package' => $order->package,
                'guide' => $order->guide, // Include guide in cancellation email
                'payment_method' => $order->payment_method,
            ];

            Mail::send('emails.cancelorderemail', $emaildata, function ($message) use ($order) {
                $message->to($order->user->email, $order->user->name)
                    ->subject('Booking Cancellation');
            });

            // Delete the order from the orders table
            $order->delete();

            return redirect()->route('historyindex')->with('success', 'Your booking has been cancelled.');
        } else {
            return redirect()->route('historyindex')->with('error', 'You can only cancel the booking within 6 days of placing the order.');
        }
    }
}
