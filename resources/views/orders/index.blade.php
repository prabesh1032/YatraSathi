@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container mx-auto mt-10">
    <!-- Title Section -->
    <div class="text-center">
        <p class="text-lg text-gray-600 mt-2">Manage and track your travel bookings with ease.</p>
    </div>

    <!-- Status Filter Dropdown -->
    <div class="mb-10 font-extrabold  text-gray-900 text-left top-0">
        <form method="GET" action="{{ route('orders.index') }}" id="statusForm">
            <select name="status" class="px-4 py-3 w-60 border border-gray-300 rounded-md text-gray-900 font-bold bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-md transition-all duration-300 ease-in-out transform hover:scale-105" onchange="document.getElementById('statusForm').submit();">
                <option value="" {{ request('status') == '' ? 'sel ected' : '' }}>All Bookings(latest)</option>
                <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="InProgress" {{ request('status') === 'InProgress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ request('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </form>
    </div>
    <!-- Bookings Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($orders as $order)
        <div class="bg-gradient-to-br from-white to-gray-100 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-transform transform hover:scale-105">
            <div class="relative">
                <img src="{{ asset('images/' . $order->package->photopath) }}" alt="{{ $order->package->name }}" class="h-56 w-full object-cover">
                <div class="absolute top-4 left-4 bg-indigo-500 text-white text-xs font-extrabold py-1.5 px-3 rounded-full shadow-lg">
                    {{ ucfirst($order->status) }}
                </div>
                <div class="absolute top-4 right-4 bg-yellow-500 text-gray-900 text-xs font-extrabold py-1.5 px-3 rounded-full shadow-lg">
                    {{ $order->payment_method }}
                </div>
            </div>
            <!-- Details Section -->
            <div class="p-4 space-y-2">
                <h2 class="text-2xl font-bold text-gray-900 truncate">{{ $order->package->name }}</h2>
                <p class="text-base font-bold text-gray-800 flex items-center"><i class="ri-user-line text-blue-500 mr-2"></i> <strong>Customer:</strong> {{ $order->name }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-map-pin-line text-red-500 mr-2"></i> <strong>Address:</strong> {{ $order->address }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-phone-line text-green-500 mr-2"></i> <strong>Phone:</strong> {{ $order->phone }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-group-line text-purple-500 mr-2"></i> <strong>Travelers:</strong> {{ $order->num_people }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-wallet-line text-yellow-500 mr-2"></i> <strong>Total Price:</strong>
                    <span class="text-green-600 font-bold">${{ number_format($order->total_price, 2) }}</span>
                </p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-time-line text-blue-500 mr-2"></i> <strong>Duration:</strong> {{ $order->duration }} days</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-calendar-event-line text-pink-500 mr-2"></i> <strong>Travelling on:</strong> {{ \Carbon\Carbon::parse($order->travel_date)->format('d M Y') }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-calendar-line text-teal-500 mr-2"></i> <strong>Booking Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <!-- Guide Info -->
                <p class="text-base text-gray-600 flex items-center"><i class="ri-user-line text-purple-500 mr-2"></i> <strong>Guide:</strong>
                    <span class="text-blue-600 font-semibold">{{ $order->guide ? $order->guide->name : 'Not Selected' }}</span>
                </p>
            </div>
            <!-- Action Buttons -->
            <div class="flex justify-between items-center p-2 bg-gray-100">
                <a href="{{ route('orders.status', [$order->id, 'Pending']) }}" class="bg-blue-600 text-white text-sm py-2 px-1 rounded-lg shadow hover:bg-blue-700 flex items-center">
                    <i class="ri-time-line mr-2"></i> Pending
                </a>
                <a href="{{ route('orders.status', [$order->id, 'InProgress']) }}" class="bg-green-600 text-white text-sm py-2 px-2 rounded-lg shadow hover:bg-green-700 flex items-center">
                    <i class="ri-refresh-line mr-2"></i> InProgress
                </a>
                <a href="{{ route('orders.status', [$order->id, 'Completed']) }}" class="bg-orange-600 text-white text-sm py-2 px-1 rounded-lg shadow hover:bg-orange-700 flex items-center">
                    <i class="ri-checkbox-circle-line mr-2"></i> Completed
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 mb-4">
                <i class="ri-calendar-todo-line text-3xl text-gray-400"></i>
            </div>
            <h3 class="text-xl font-medium text-gray-700 mb-2">No bookings found</h3>
            <p class="text-gray-500 max-w-md mx-auto">
                @if(request()->get('status'))
                    There are no {{ strtolower(request()->get('status')) }} bookings at the moment.
                @else
                    You don't have any bookings yet. Start your journey today!
                @endif
            </p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($orders->hasPages())
    <div class="mt-12 flex justify-center">
        {{ $orders->appends(request()->query())->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection
