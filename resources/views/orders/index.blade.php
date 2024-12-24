@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-8">Your Bookings</h1>

    <!-- Responsive Grid for displaying bookings -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($orders as $order)
        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:scale-105 duration-300 overflow-hidden">
            <!-- Image -->
            <div class="relative">
                <img src="{{ asset('images/' . $order->package->photopath) }}" alt="{{ $order->package->name }}" class="h-48 w-full object-cover">
                <div class="absolute top-4 right-4 bg-yellow-500 text-black text-xs font-bold py-1 px-3 rounded-full shadow-md">
                    {{ $order->payment_method }}
                </div>
            </div>

            <!-- Details -->
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 truncate">{{ $order->package->name }}</h2>
                <p class="text-sm text-gray-600 mt-2"><strong>Customer:</strong> {{ $order->name }}</p>
                <p class="text-sm text-gray-600"><strong>Address:</strong> {{ $order->address }}</p>
                <p class="text-sm text-gray-600"><strong>Phone:</strong> {{ $order->phone }}</p>
                <p class="text-sm text-gray-600"><strong>Travelers:</strong> {{ $order->num_people }}</p>
                <p class="text-sm text-gray-600"><strong>Total Price:</strong>
                    <span class="text-green-600 font-semibold">${{ number_format($order->total_price, 2) }}</span>
                </p>
                <p class="text-sm text-gray-600"><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
            </div>

            <!-- Status Buttons -->
            <div class="grid grid-cols-3 gap-1 p-4 bg-gray-100">
                <a href="{{ route('orders.status', [$order->id, 'Pending']) }}"
                   class="text-center bg-blue-500 text-white text-sm py-2 rounded-lg hover:bg-blue-600 shadow-sm">
                    Pending
                </a>
                <a href="{{ route('orders.status', [$order->id, 'Processing']) }}"
                   class="text-center bg-green-500 text-white text-sm py-2 rounded-lg hover:bg-green-600 shadow-sm">
                    Processing
                </a>
                <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}"
                   class="text-center bg-orange-500 text-white text-sm py-2 rounded-lg hover:bg-orange-600 shadow-sm">
                    Delivered
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
