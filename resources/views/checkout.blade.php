@extends('layouts.master')

@section('content')
    <h2 class="text-4xl font-bold text-gray-800 text-center py-10">Checkout</h2>

    <!-- Checkout Form -->
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 px-5 md:px-20 py-10">

            <!-- Package Information -->
            <div class="col-span-1 lg:col-span-1 flex flex-col bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/packages/' . $package->image_path) }}" alt="Package Image" class="w-full h-48 object-cover rounded-lg mb-5">

                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $package->name }}</h2>
                    <p class="text-lg text-gray-600 mt-2">Price: ₹{{ number_format($package->price, 2) }}</p>
                    <p class="text-lg text-gray-800 font-semibold mt-2">Total: ₹{{ number_format($package->price, 2) }}</p>
                </div>

                <!-- Hidden Fields -->
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <input type="hidden" name="price" value="{{ $package->price }}">
            </div>

            <!-- User Information -->
            <div class="col-span-1 lg:col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-gray-800 mb-5">Your Information</h3>

                <!-- Name -->
                <input type="text" name="name" placeholder="Full Name" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ auth()->user()->name }}" required>

                <!-- Address -->
                <input type="text" name="address" placeholder="Address" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>

                <!-- Phone -->
                <input type="text" name="phone" placeholder="Phone Number" class="w-full border rounded-lg p-4 mb-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Order Summary and Payment -->
            <div class="col-span-1 lg:col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-gray-800 mb-5">Order Summary</h3>

                <div class="mb-5">
                    <h2 class="text-xl font-semibold text-gray-800">Total: ₹{{ number_format($package->price, 2) }}</h2>
                </div>

                <select name="payment_method" class="w-full border rounded-lg p-4 mb-5 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="COD">Cash On Delivery</option>
                </select>

                <!-- Checkout Button -->
                <button type="submit" class="bg-blue-500 text-white w-full p-4 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">Checkout</button>
            </div>
        </div>
    </form>

    <!-- eSewa Payment Form -->
    <form action="https://uat.esewa.com.np/epay/main" method="POST" class="mt-10">
        <input type="hidden" id="amount" name="tAmt" value="{{ $package->price }}" required>
        <input type="hidden" id="amt" name="amt" value="{{ $package->price }}" required>
        <input type="hidden" name="txAmt" value="0" required>
        <input type="hidden" name="psc" value="0" required>
        <input type="hidden" name="pdc" value="0" required>
        <input type="hidden" name="scd" value="EPAYTEST" required>
        <input type="hidden" name="pid" value="YatraSathi_{{ uniqid() }}" required>
        <input type="hidden" name="su" value="{{ route('orders.esewa', $package->id) }}" required>
        <input type="hidden" name="fu" value="{{ route('bookmarks.index') }}" required>

        <!-- Payment Button -->
        <input value="Pay with eSewa" type="submit" class="bg-green-500 text-white w-full p-4 rounded-lg cursor-pointer mt-5 hover:bg-green-600 transition duration-300 ease-in-out">
    </form>

@endsection
