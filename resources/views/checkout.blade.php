@extends('layouts.master')

@section('content')
<div class="bg-gray-100 py-10">
    <h2 class="text-4xl font-bold text-gray-800 text-center py-10">Trip Confirmation</h2>

    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10 px-5 md:px-20">
        <!-- Package Information -->
        <div class="col-span-1 bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <img src="{{ asset('images/'.$bookmark->package->photopath) }}" alt="Package Image" class="w-full h-48 object-cover rounded-lg mb-5">
            <h2 class="text-2xl font-bold text-gray-800">{{ $bookmark->package->name }}</h2>
            <p class="text-lg text-gray-600 mt-2">Price:
                <span class="text-blue-500 font-semibold">${{ number_format($bookmark->total_price, 2) }}</span>
            </p>
            <p class="text-lg text-gray-600 mt-2">Duration:
                <span class="text-blue-500 font-semibold">{{ $bookmark->duration }} Days</span>
            </p>
            <p class="text-lg text-gray-600 mt-2">Number of People:
                <span class="text-blue-500 font-semibold">{{ $bookmark->num_people ?? 1 }}</span>
            </p>
            <p class="text-lg text-gray-600 mt-2">Guide:
                <span class="text-blue-500 font-semibold">{{ $bookmark->guide ? $bookmark->guide->name : 'Not Selected' }}</span>
            </p>
        </div>
        <!-- User Information -->
        <div class="col-span-1 bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <h3 class="text-2xl font-semibold text-gray-800 mb-5">Your Information</h3>
            <form action="{{ route('orders.store') }}" method="post" id="COD">
                @csrf
                <!-- Hidden Fields -->
                <input type="hidden" name="package_id" value="{{ $bookmark->package_id }}">
                <input type="hidden" name="price" value="{{ $bookmark->total_price }}">
                <input type="hidden" name="bookmark_id" value="{{ $bookmark->id }}">
                <input type="hidden" name="num_people" value="{{ $bookmark->num_people ?? 1 }}">
                <input type="hidden" name="duration" value="{{ $bookmark->duration?? 1 }}">
                <!-- Guide ID (If available) -->
                <input type="hidden" name="guide_id" value="{{ $bookmark->guide->id ?? '' }}">

                <!-- Name -->
                <input type="text" name="name" placeholder="Full Name" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ auth()->user()->name }}" required>

                <!-- Address -->
                <input type="text" name="address" placeholder="Address" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ auth()->user()->address }}" required>

                <!-- Phone -->
                <input type="text" name="phone" placeholder="Phone Number" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ auth()->user()->phone }}" required>
                <input type="email" name="email" placeholder="Email" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ auth()->user()->email }}" required>
                <!-- Travel Date -->
                <label for="travel_date" class="block text-gray-700 mb-2 font-medium">Travel Date:</label>
                <input type="date" id="travel_date" name="travel_date" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    min="{{ now()->toDateString() }}" required>
            </form>
        </div>
        <!-- Order Summary and Payment -->
        <div class="col-span-1 bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <h3 class="text-2xl font-semibold text-gray-800 mb-5">Order Summary</h3>
            @php
            $num_people = $bookmark->num_people ?? 1; // Fallback to 1 if num_people is not set
            $total_price = $bookmark->total_price;
            @endphp

            <h2 class="text-xl font-semibold text-gray-800 mb-5">Total:
                <span class="text-blue-500">${{ number_format($total_price, 2) }}</span>
            </h2>
            <!-- Payment Method -->
            <select name="payment_method" class="w-full border rounded-lg p-4 mb-5 shadow-sm bg-gray-100 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="COD" class="text-gray-700">Cash On Delivery</option>
                <option value="esewa" class="text-gray-700">eSewa</option>
            </select>

            <!-- Order Now Button -->
            <button type="button" id="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white w-full p-4 rounded-lg hover:from-indigo-600 hover:to-blue-500 shadow-lg transition duration-300 ease-in-out">
                Book Now
            </button>
        </div>
    </div>
</div>

<!-- eSewa Payment Form -->
<form id="esewa" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" class="hidden">
    <input type="hidden" id="amount" name="amount" value="{{ $total_price }}" required>
    <input type="hidden" id="tax_amount" name="tax_amount" value="0" required>
    <input type="hidden" id="total_amount" name="total_amount" value="{{ $total_price }}" required>
    <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
    <input type="hidden" id="product_code" name="product_code" value="EPAYTEST" required>
    <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
    <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
    <input type="hidden" id="success_url" name="success_url" value="{{ route('order.storeEsewa', $bookmark->id) }}" required>
    <input type="hidden" id="failure_url" name="failure_url" value="{{ route('bookmarks.index') }}" required>
    <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
    <input type="hidden" id="signature" name="signature" value="" required>
</form>

@php
$total_amount = $bookmark->package->price;
$transaction_uuid = time();
$msg = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
$secret = "8gBm/:&EnhH.1/q";
$s = hash_hmac('sha256', $msg, $secret, true);
$signature = base64_encode($s);
@endphp

<script>
    // Setting eSewa form data dynamically
    document.getElementById('amount').value = "{{ $total_amount }}";
    document.getElementById('total_amount').value = "{{ $total_amount }}";
    document.getElementById('transaction_uuid').value = "{{ $transaction_uuid }}";
    document.getElementById('signature').value = "{{ $signature }}";

    // Handle payment method selection
    document.getElementById('submit').addEventListener("click", function(event) {
        event.preventDefault();

        const paymentMethod = document.querySelector('select[name="payment_method"]').value;

        if (paymentMethod === "COD") {
            document.getElementById('COD').submit();
        } else if (paymentMethod === "esewa") {
            document.getElementById('esewa').submit();
        } else {
            alert("Please select a valid payment method.");
        }
    });
</script>
@endsection
