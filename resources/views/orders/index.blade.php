@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container mx-auto mt-10">
    <!-- Grid for displaying bookings -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($orders as $order)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
            <!-- Image -->
            <img src="{{ asset('images/' . $order->package->photopath) }}" alt="{{ $order->package->name }}" class="h-48 w-full object-cover">

            <!-- Details -->
            <div class="p-5">
                <h2 class="text-lg font-bold text-gray-800">{{ $order->package->name }}</h2>
                <p class="text-sm text-gray-600 mt-1"><strong>Customer:</strong> {{ $order->name }}</p>
                <p class="text-sm text-gray-600"><strong>Address:</strong> {{ $order->address }}</p>
                <p class="text-sm text-gray-600"><strong>Phone:</strong> {{ $order->phone }}</p>
                <p class="text-sm text-gray-600"><strong>Price:</strong> ${{ number_format($order->price, 2) }}</p>
                <p class="text-sm text-gray-600"><strong>Payment:</strong> {{ $order->payment_method }}</p>
                <p class="text-sm text-gray-600"><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
            </div>

            <!-- Status Buttons -->
            <div class="grid grid-cols-3 gap-1 p-4 bg-gray-100">
                <a href="{{ route('orders.status', [$order->id, 'Pending']) }}" class="text-center bg-blue-600 text-white text-sm py-2 rounded-lg hover:bg-blue-700">Pending</a>
                <a href="{{ route('orders.status', [$order->id, 'Processing']) }}" class="text-center bg-green-600 text-white text-sm py-2 rounded-lg hover:bg-green-700">Processing</a>
                <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}" class="text-center bg-orange-600 text-white text-sm py-2 rounded-lg hover:bg-orange-700">Delivered</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
