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
        // Validate the incoming request
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'num_people' => 'nullable|integer|min:1', // Ensure num_people is valid
        ]);

        // Default the num_people to 1 if not provided
        $data['num_people'] = $request->input('num_people', 1);

        // Additional data to be stored in the order
        $data['payment_method'] = "COD";
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'Pending';
        $data['total_price'] = $request->price * $data['num_people']; // Calculate total price based on num_people
        // dd($request->all());
        // Create the order
        Order::create($data);

        // Remove from bookmarks if it exists
        Bookmark::where('user_id', $data['user_id'])
            ->where('package_id', $data['package_id'])
            ->delete();

        return redirect('/')->with('success', 'Booking has been placed successfully.');
    }


        public function index()
    {
        // Fetch orders with pagination (10 items per page)
        $orders = Order::latest()->paginate(12);

        return view('orders.index', compact('orders'));
    }


    // Update the booking status
    public function status($id, $status)
    {
        $order = Order::with('package')->findOrFail($id);
        $order->status = $status;
        $order->save();

        $emaildata = [
            'name' => $order->user->name,
            'status' => $status,
            'order'=>$order,
            'package' => $order->package,
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
    public function storeEsewa(Request $request, $bookmarkId)
    {

        $data=$request->data;
        $data=base64_decode($data);
        $data=json_decode($data);
        $status=$data->status;

        if($status==="COMPLETE")
        {
            $bookmark = Bookmark::find($bookmarkId);
            if (!$bookmark) {
                return redirect('/')->with('error', 'Bookmark not found.');
            }
             $order = new Order();
             $order->package_id = $bookmark->package_id;
             $order->total_price = $bookmark->total_price;
             $order->num_people = $bookmark->num_people;
             $order->payment_method = "eSewa";
             $order->name = $bookmark->user->name;
             $order->phone = 'N/A';
             $order->address = 'N/A';
             $order->user_id = auth()->user()->id;
             $order->status = "Pending";
             $order->save();
             $bookmark->delete();
            $emaildata = [
                'name' => $order->user->name,
                'status' => 'Pending',
                'order' => $order,
                'package' => $order->package,
                'paymentMethod' => $order->payment_method,
            ];

            // Send confirmation email
            Mail::send('emails.orderemail', $emaildata, function ($message) use ($order) {
                $message->to($order->user->email, $order->user->name)
                    ->subject('Booking Confirmation');
            });

            return redirect('/')->with('success', 'Booking completed via eSewa successfully.');
        }

        return redirect('/')->with('error', 'eSewa payment failed.');
    }
}
