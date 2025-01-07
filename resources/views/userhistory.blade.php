@extends('layouts.master')
@section('content')
<div class="container mx-auto mt-10">
    <!-- Intro Section -->
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-indigo-700">
            <i class="ri-road-map-line mr-3 text-yellow-500"></i>Your Travel History
        </h1>
        <p class="text-lg text-gray-600 mt-4">
            Take a journey through your past adventures and memories. Relive the moments and manage your bookings effortlessly.
        </p>
    </div>
    <!-- Bookings Grid -->
    <div class="grid grid-cols-1 mb-4 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($orders as $order)
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
            <!-- Image Section -->
            <div class="relative">
                <img src="{{ asset('images/' . $order->package->photopath) }}" alt="{{ $order->package->name }}" class="h-60 w-full object-cover">
                <div class="absolute top-4 left-4 bg-indigo-600 text-white text-xs font-bold py-1.5 px-3 rounded-full shadow">
                    Visited
                </div>
                <div class="absolute top-4 right-4 bg-yellow-400 text-gray-900 text-xs font-bold py-1.5 px-3 rounded-full shadow">
                    {{ $order->payment_method }}
                </div>
            </div>
            <!-- Details Section -->
            <div class="p-5 space-y-4">
                <h2 class="text-2xl font-bold text-gray-800 truncate flex items-center">
                    <i class="ri-plane-fill text-blue-500 mr-2"></i>{{ $order->package->name }}
                </h2>
                <p class="text-base font-medium text-gray-700 flex items-center">
                    <i class="ri-user-line text-green-500 mr-2"></i><strong>Customer:</strong> {{ $order->name }}
                </p>
                <p class="text-base text-gray-600 flex items-center">
                    <i class="ri-map-pin-line text-red-500 mr-2"></i><strong>Address:</strong> {{ $order->address }}
                </p>
                <p class="text-base text-gray-600 flex items-center">
                    <i class="ri-phone-line text-yellow-500 mr-2"></i><strong>Phone:</strong> {{ $order->phone }}
                </p>
                <p class="text-base text-gray-600 flex items-center">
                    <i class="ri-group-line text-purple-500 mr-2"></i><strong>Travelers:</strong> {{ $order->num_people }}
                </p>
                <p class="text-base text-gray-600 flex items-center">
                    <i class="ri-wallet-line text-teal-500 mr-2"></i><strong>Total Price:</strong>
                    <span class="text-green-600 font-bold">${{ number_format($order->total_price, 2) }}</span>
                </p>
                <p class="text-base text-gray-600 flex items-center">
                    <i class="ri-calendar-line text-indigo-500 mr-2"></i><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}
                </p>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <img src="{{ asset('notfound.jpg') }}" alt="No Bookings Found" class="w-1/3 mx-auto mb-2">
            <h2 class="text-3xl font-bold text-gray-800">No Booking History Yet</h2>
            <p class="text-gray-600 py-8 mt-2">It looks like your travel adventures are yet to begin. Discover exciting destinations and start your journey today!</p>
            <a href="{{ route('packages') }}" class="mt-4 bg-indigo-600 text-white px-6 py-3 rounded-lg text-lg shadow-md hover:bg-indigo-700 transition">
                <i class="ri-flight-takeoff-line mr-2"></i>Explore Packages
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection
