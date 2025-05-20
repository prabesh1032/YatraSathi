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
    public function directCheckout(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'num_people' => 'required|integer|min:1',
            'duration_range' => 'required|integer|min:1',
            'guide_id' => 'nullable|exists:guides,id',
        ]);

        $package = Package::findOrFail($data['package_id']);

        $data['duration'] = $data['duration_range'];
        $data['total_price'] = $package->price * $data['num_people'] * $data['duration'];

        $guide = null;
        if (!empty($data['guide_id'])) {
            $guide = Guide::find($data['guide_id']);
            if (!$guide) {
                return back()->with('error', 'Selected guide is invalid.');
            }
        }

        return view('checkout', [
            'package' => $package,
            'num_people' => $data['num_people'],
            'duration' => $data['duration'],
            'total_price' => $data['total_price'],
            'guide' => $guide
        ]);
    }
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
        $query = Order::query();

        if (request()->filled('status')) {
            $query->where('status', request('status'));
        }

        $orders = $query->latest()->paginate(12);

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

    public function storeEsewa(Request $request, $package_id)
    {
        $encodedData = $request->input('data');
        $decodedData = base64_decode($encodedData);
        $data = json_decode($decodedData);

        // ❌ Check if eSewa status is not COMPLETE
        if (!isset($data->status) || $data->status !== "COMPLETE") {
            return redirect('/')->with('error', '❌ eSewa payment failed.');
        }

        // ✅ Extract values safely
        $total_price = $data->total_price ?? 0;
        $num_people = $data->num_people ?? 1;
        $duration = $data->duration ?? 1;
        $guide_id = $data->guide_id ?? null;
        $travel_date = $data->travel_date ?? now()->addDays(1)->toDateString();

        $user = auth()->user();

        // ✅ Create order
        $order = new Order();
        $order->package_id = $package_id;
        $order->total_price = $total_price;
        $order->num_people = $num_people;
        $order->duration = $duration;
        $order->payment_method = "eSewa";
        $order->name = $user->name;
        $order->phone = $user->phone;
        $order->address = $user->address;
        $order->travel_date = $travel_date;
        $order->guide_id = $guide_id;
        $order->user_id = $user->id;
        $order->status = "Pending";
        $order->save();

        // ✉️ Send email
        $emaildata = [
            'name' => $user->name,
            'status' => 'Pending',
            'order' => $order,
            'package' => $order->package,
            'guide' => $order->guide,
            'paymentMethod' => $order->payment_method,
        ];

        Mail::send('emails.orderemail', $emaildata, function ($message) use ($order, $user) {
            $message->to($user->email, $user->name)
                ->subject('Booking Confirmation');
        });

        // ✅ Redirect with success
        return redirect('/')->with('success', '✅ Booking completed via eSewa successfully.');
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
