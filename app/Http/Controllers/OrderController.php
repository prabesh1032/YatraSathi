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
        // Validate POST input
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'num_people' => 'required|integer|min:1',
            'duration_range' => 'required|integer|min:1',
            'guide_id' => 'nullable|exists:guides,id',
            'travel_date' => 'required|date|after:today',
        ]);

        $package = Package::findOrFail($data['package_id']);

        $data['duration'] = $data['duration_range'];
        $data['total_price'] = $package->package_price * $data['num_people'] * $data['duration'];

        // Store all required data in session for the GET checkout page
        session([
            'checkout_data' => [
                'package' => $package,
                'num_people' => $data['num_people'],
                'duration' => $data['duration'],
                'total_price' => $data['total_price'],
                'travel_date' => $data['travel_date'],
                'guide_id' => $data['guide_id'] ?? null,
            ]
        ]);

        // Redirect to GET route to show checkout page
        return redirect()->route('checkout.final');
    }
    public function finalCheckout()
    {
        $checkoutData = session('checkout_data');

        if (!$checkoutData) {
            return redirect('/')->with('error', 'No checkout data found. Please start booking again.');
        }

        $guide = null;
        if (!empty($checkoutData['guide_id'])) {
            $guide = Guide::find($checkoutData['guide_id']);
        }

        return view('checkout', [
            'package' => $checkoutData['package'],
            'num_people' => $checkoutData['num_people'],
            'duration' => $checkoutData['duration'],
            'total_price' => $checkoutData['total_price'],
            'travel_date' => $checkoutData['travel_date'],
            'guide' => $guide,
        ]);
    }

    public function store(Request $request)
    {
        // Validate only user input fields here
        $userData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        // Retrieve checkout data from session
        $checkoutData = session('checkout_data');
        if (!$checkoutData) {
            return redirect('/')->with('error', 'No booking data found. Please start again.');
        }
        // Prepare data to store in order
        $data = [
            'package_id' => $checkoutData['package']->id,
            'guide_id' => $checkoutData['guide_id'] ?? null,
            'name' => $userData['name'],
            'phone' => $userData['phone'],
            'address' => $userData['address'],
            'price' => $checkoutData['total_price'], // total price already calculated
            'duration' => $checkoutData['duration'],
            'num_people' => $checkoutData['num_people'],
            'travel_date' => $checkoutData['travel_date'],
            'payment_method' => 'COD',
            'user_id' => auth()->user()->id,
            'status' => 'Pending',
            'total_price' => $checkoutData['total_price'], // total price
        ];

        // Create the order
        $order = Order::create($data);

        // Send email to guide if assigned
        if ($data['guide_id']) {
            $guide = Guide::find($data['guide_id']);
            if ($guide) {
                $emailData = [
                    'userName' => $data['name'],
                    'userPhone' => $data['phone'],
                    'userAddress' => $data['address'],
                    'packageName' => $checkoutData['package']->package_name,
                    'travelDate' => $data['travel_date'],
                    'numPeople' => $data['num_people'],
                    'totalPrice' => $data['total_price'],
                    'guide' => $guide,
                ];

                Mail::send('emails.orderguidemail', $emailData, function ($message) use ($guide) {
                    $message->to($guide->email, $guide->name)
                        ->subject('You have a new booking!');
                });
                Mail::send('emails.orderemail', $emailData, function ($message) use ($order) {
                    $message->to($order->user->email, $order->user->name)
                        ->subject('Booking Status Update');
                });
            }
        }
        // Clear checkout session data after order placed
        session()->forget('checkout_data');

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

    public function storeEsewa(Request $request, $package_id, $no_of_people, $duration, $travel_date)
    {
        $encodedData = $request->input('data');
        $decodedData = base64_decode($encodedData);
        $data = json_decode($decodedData);
        $package = Package::findOrFail($package_id);

        // ❌ Check if eSewa status is not COMPLETE
        if (!isset($data->status) || $data->status !== "COMPLETE") {
            return redirect('/')->with('error', '❌ eSewa payment failed.');
        }

        // ✅ Extract values safely
        $total_price = $data->total_amount ?? 0;
        $num_people = $no_of_people ?? 1;
        $duration = $duration ?? 1;
        $guide_id = $guide_id ?? null;
        $travel_date = $travel_date ?? now()->addDays(1)->toDateString();

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
