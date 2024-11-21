<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Bookmark;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // Store a new booking order
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'payment_method' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'Pending';

        // Create the order
        Order::create($data);
        // Remove from bookmarks if exists
        Bookmark::where('user_id', $data['user_id'])
            ->where('package_id', $data['package_id'])
            ->delete();

        return redirect('/')->with('success', 'Booking has been placed successfully.');
    }

    // Display all orders for admin
    public function index()
    {
        $orders = Order::with('package', 'user')->get();
        return view('orders.index', compact('orders'));
    }

    // Update the booking status
    public function status($id, $status)
    {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();

        $emaildata = [
            'name' => $order->user->name,
            'status' => $status,
        ];

        // Send email notification
        Mail::send('emails.orderstatus', $emaildata, function ($message) use ($order) {
            $message->to($order->user->email, $order->user->name)
                ->subject('Booking Status Update');
        });

        return back()->with('success', 'Booking status updated to ' . $status);
    }

    // Handle eSewa payment and booking confirmation
    public function storeEsewa(Request $request, $packageId)
    {
        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data);

        if ($data->status === "COMPLETE") {
            $package = Package::find($packageId);

            $order = new Order();
            $order->package_id = $package->id;
            $order->payment_method = "eSewa";
            $order->name = auth()->user()->name;
            $order->phone = 'N/A';
            $order->address = 'N/A';
            $order->user_id = auth()->user()->id;
            $order->status = "Pending";
            $order->save();

            $emaildata = [
                'name' => $order->user->name,
                'status' => 'Pending',
            ];

            // Send confirmation email
            Mail::send('emails.orderstatus', $emaildata, function ($message) use ($order) {
                $message->to($order->user->email, $order->user->name)
                    ->subject('Booking Confirmation');
            });

            return redirect('/')->with('success', 'Booking completed via eSewa successfully.');
        }

        return redirect('/')->with('error', 'eSewa payment failed.');
    }
}
