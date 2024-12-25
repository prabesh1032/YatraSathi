@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container mx-auto mt-10">
    <!-- Title Section -->
    <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold text-gray-800">Your <span class="text-indigo-500">Bookings</span></h1>
        <p class="text-lg text-gray-600 mt-2">Manage and track your travel bookings with ease.</p>
    </div>

    <!-- Responsive Grid for Bookings -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
        @foreach ($orders as $order)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <!-- Image Section -->
            <div class="relative">
                <img src="{{ asset('images/' . $order->package->photopath) }}" alt="{{ $order->package->name }}" class="h-48 w-full object-cover">
                <div class="absolute top-4 right-4 bg-yellow-500 text-white text-xs font-semibold py-1 px-3 rounded-full shadow-lg">
                    {{ $order->payment_method }}
                </div>
            </div>

            <!-- Details Section -->
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-900 truncate">{{ $order->package->name }}</h2>
                <p class="text-sm text-gray-600 mt-2"><i class="ri-user-line"></i> <strong>Customer:</strong> {{ $order->name }}</p>
                <p class="text-sm text-gray-600"><i class="ri-map-pin-line"></i> <strong>Address:</strong> {{ $order->address }}</p>
                <p class="text-sm text-gray-600"><i class="ri-phone-line"></i> <strong>Phone:</strong> {{ $order->phone }}</p>
                <p class="text-sm text-gray-600"><i class="ri-group-line"></i> <strong>Travelers:</strong> {{ $order->num_people }}</p>
                <p class="text-sm text-gray-600"><i class="ri-wallet-line"></i> <strong>Total Price:</strong>
                    <span class="text-green-600 font-bold">${{ number_format($order->total_price, 2) }}</span>
                </p>
                <p class="text-sm text-gray-600"><i class="ri-calendar-line"></i> <strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-around items-center p-4 bg-gray-100">
                <a href="{{ route('orders.status', [$order->id, 'Pending']) }}" class="bg-blue-500 text-white text-sm py-2 px-4 rounded-lg shadow hover:bg-blue-600">
                    <i class="ri-time-line"></i> Pending
                </a>
                <a href="{{ route('orders.status', [$order->id, 'Processing']) }}" class="bg-green-500 text-white text-sm py-2 px-4 rounded-lg shadow hover:bg-green-600">
                    <i class="ri-refresh-line"></i> Processing
                </a>
                <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}" class="bg-orange-500 text-white text-sm py-2 px-4 rounded-lg shadow hover:bg-orange-600">
                    <i class="ri-checkbox-circle-line"></i> Delivered
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $orders->links('pagination::tailwind') }}
    </div>
</div>
@endsection
