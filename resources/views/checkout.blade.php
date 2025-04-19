@extends('layouts.master')

@section('content')
<div class="bg-gray-100 py-10">
    <h2 class="text-5xl font-extrabold text-gray-800 text-center py-10">
        <i class="ri-check-double-line text-green-500 text-6xl mr-3"></i>
        Trip Confirmation
    </h2>
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10 px-5 md:px-20">
        <!-- Package Information -->
        <div class="col-span-1 bg-gradient-to-r from-white to-gray-100 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out relative">
            <!-- Package Image -->
            <img src="{{ asset('images/'.$package->photopath) }}" alt="Package Image" class="w-full h-48 object-cover rounded-lg mb-5 shadow-md hover:shadow-lg transition-shadow duration-300">

            <!-- Package Title -->
            <h2 class="text-2xl font-extrabold text-gray-900 mb-2 flex items-center">
                {{ $package->name }}
            </h2>

            <!-- Price -->
            <p class="text-lg font-medium text-gray-700 mt-2 flex items-center">
                <i class="ri-money-dollar-circle-line text-green-500 text-2xl mr-2"></i>
                Price: <span class="text-green-600 font-bold ml-1">${{ number_format($total_price, 2) }}</span>
            </p>

            <!-- Duration -->
            <p class="text-lg font-medium text-gray-700 mt-2 flex items-center">
                <i class="ri-time-line text-purple-500 text-2xl mr-2"></i>
                Duration: <span class="text-purple-600 font-bold ml-1">{{ $duration }} Days</span>
            </p>

            <!-- Number of People -->
            <p class="text-lg font-medium text-gray-700 mt-2 flex items-center">
                <i class="ri-user-3-line text-yellow-500 text-2xl mr-2"></i>
                Number of People: <span class="text-yellow-600 font-bold ml-1">{{ $num_people ?? 1 }}</span>
            </p>

            <!-- Guide -->
            <p class="text-lg font-medium text-gray-700 mt-2 flex items-center">
                <i class="ri-user-star-line text-blue-500 text-2xl mr-2"></i>
                Guide: <span class="text-blue-600 font-bold ml-1">{{ $guide ? $guide->name : 'Not Selected' }}</span>
            </p>
        </div>

        <!-- User Information -->
        <div class="col-span-1 bg-gradient-to-r from-white to-gray-100 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <h3 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="ri-user-line text-blue-500 text-3xl mr-2"></i> Your Information
            </h3>
            <form action="{{ route('orders.store') }}" method="post" id="COD">
                @csrf
                <!-- Hidden Fields -->
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <input type="hidden" name="price" value="{{ $package->price }}">
                <input type="hidden" name="num_people" value="{{ $num_people ?? 1 }}">
                <input type="hidden" name="duration" value="{{ $package->duration }}">
                <input type="hidden" name="guide_id" value="{{ $guide->id ?? '' }}">

                <!-- Full Name -->
                <div class="mb-4 flex items-center">
                    <i class="ri-account-circle-line text-blue-500 text-2xl mr-3"></i>
                    <input type="text" name="name" placeholder="Full Name"
                        class="w-full border-gray-300 rounded-lg p-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ auth()->user()->name }}" required>
                </div>

                <!-- Address -->
                <div class="mb-4 flex items-center">
                    <i class="ri-map-pin-line text-blue-500 text-2xl mr-3"></i>
                    <input type="text" name="address" placeholder="Address"
                        class="w-full border-gray-300 rounded-lg p-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ auth()->user()->address }}" required>
                </div>

                <!-- Phone -->
                <div class="mb-4 flex items-center">
                    <i class="ri-phone-line text-blue-500 text-2xl mr-3"></i>
                    <input type="text" name="phone" placeholder="Phone Number"
                        class="w-full border-gray-300 rounded-lg p-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ auth()->user()->phone }}" required>
                </div>

                <!-- Email -->
                <div class="mb-4 flex items-center">
                    <i class="ri-mail-line text-blue-500 text-2xl mr-3"></i>
                    <input type="email" name="email" placeholder="Email"
                        class="w-full border-gray-300 rounded-lg p-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ auth()->user()->email }}" required>
                </div>

                <!-- Travel Date -->
                <div class="mb-4 flex items-center">
                    <i class="ri-calendar-line text-blue-500 text-2xl mr-3"></i>
                    <input type="date" name="travel_date" class="w-full border-gray-300 rounded-lg p-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        min="{{ now()->toDateString() }}" required>
                </div>
            </form>
        </div>
        <!-- Order Summary and Payment -->
        <div class="col-span-1 bg-gradient-to-r from-white to-gray-100 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <div>
                <!-- Order Summary Title -->
                <h3 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="ri-shopping-cart-line text-blue-500 text-3xl mr-2"></i> Order Summary
                </h3>

                <!-- Total Price -->
                <h2 class="text-2xl font-semibold text-gray-800 mb-5 flex items-center">
                    <i class="ri-money-dollar-circle-line text-green-500 text-2xl mr-2"></i>
                    Total: <span class="text-blue-500 ml-2">${{ number_format($total_price, 2) }}</span>
                </h2>

                <!-- Payment Method -->
                <div class="flex items-center mb-5">
                    <i class="ri-wallet-3-line text-blue-500 text-2xl mr-3"></i>
                    <select id="paymentMethod" name="payment_method" class="w-full border rounded-lg p-4 shadow-sm bg-gray-100 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="COD" class="text-gray-700">Cash On Delivery</option>
                        <option value="esewa" class="text-gray-700">eSewa</option>
                    </select>
                </div>

                <!-- Cancellation Policy -->
                <div class="bg-gray-100 p-4 mt-1 rounded-lg mb-9 shadow-sm">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="ri-calendar-check-line text-green-500 text-xl mr-2"></i> Cancellation Policy
                    </h4>
                    <p class="text-gray-700 text-md">
                        Free cancellation available up to 48 hours before the travel date. For last-minute changes,
                        contact support at <a href="mailto:support@yatrasathi.com" class="text-blue-500 underline">support@yatrasathi.com</a>.
                    </p>
                </div>
            </div>

            <!-- Order Now Button -->
            <div>
                <button id="paymentButton" type="button" class="w-full py-2 rounded-lg text-white text-lg font-semibold shadow-lg transition duration-300 ease-in-out">
                    Confirm Book
                </button>
            </div>
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
    <input type="hidden" id="success_url" name="success_url" value="{{ route('order.storeEsewa', $package->id) }}" required>
    <input type="hidden" id="failure_url" name="failure_url" value="" required>
    <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
    <input type="hidden" id="signature" name="signature" value="" required>
</form>

@php
$total_amount = $package->price;
$transaction_uuid = time();
$msg = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
$secret = "8gBm/:&EnhH.1/q";
$s = hash_hmac('sha256', $msg, $secret, true);
$signature = base64_encode($s);
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set eSewa form data dynamically
        document.getElementById('amount').value = "{{ $total_amount }}";
        document.getElementById('total_amount').value = "{{ $total_amount }}";
        document.getElementById('transaction_uuid').value = "{{ $transaction_uuid }}";
        document.getElementById('signature').value = "{{ $signature }}";

        // Elements
        const paymentMethodSelect = document.getElementById('paymentMethod');
        const paymentButton = document.getElementById('paymentButton');

        // Function to update button color based on payment method
        function updateButtonColor() {
            const selectedMethod = paymentMethodSelect.value;

            if (selectedMethod === 'esewa') {
                paymentButton.style.backgroundColor = 'green'; // Green for eSewa
            } else if (selectedMethod === 'COD') {
                paymentButton.style.backgroundColor = 'purple'; // Purple for Cash On Delivery
            } else {
                paymentButton.style.backgroundColor = 'gray'; // Default color for invalid option
            }
        }

        // Set default button color based on initial selected value
        updateButtonColor();

        // Update button color when payment method is changed
        paymentMethodSelect.addEventListener('change', updateButtonColor);

        // Handle payment method selection
        paymentButton.addEventListener("click", function(event) {
            event.preventDefault();

            const paymentMethod = paymentMethodSelect.value;

            if (paymentMethod === "COD") {
                document.getElementById('COD').submit(); // Submit the COD form
            } else if (paymentMethod === "esewa") {
                document.getElementById('esewa').submit(); // Submit the eSewa form
            } else {
                alert("Please select a valid payment method.");
            }
        });
    });
</script>
@endsection
