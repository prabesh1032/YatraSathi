@extends('layouts.master')

@section('content')
<div class="container px-10 py-10 mt-10">
    <!-- Intro Section -->
    <div class="text-center mb-2">
        <h1 class="text-5xl font-extrabold text-indigo-700">
            <i class="ri-road-map-line mr-3 text-yellow-500"></i>Your Travel History
        </h1>
        <p class="text-lg text-gray-600 mt-4">
            Take a journey through your past adventures and memories. Relive the moments and manage your bookings effortlessly.
        </p>
    </div>

    <!-- Bookings Grid -->
    <div class="grid grid-cols-1 mb-2 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($orders as $order)
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
            <!-- Image Section -->
            <div class="relative">
                <img src="{{ asset('images/' . $order->package->photopath) }}" alt="{{ $order->package->name }}" class="h-60 w-full object-cover">
                <div class="absolute top-4 left-4 bg-indigo-500 text-white text-xs font-extrabold py-1.5 px-3 rounded-full shadow-lg">
                    {{ ucfirst($order->status) }}
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
                    <i class="ri-time-line text-orange-500 mr-2"></i><strong>Duration:</strong> {{ $order->duration }} days
                </p>
                <p class="text-base text-gray-600 flex items-center">
                    <i class="ri-calendar-event-line text-pink-500 mr-2"></i> <strong>Travels Date:</strong> {{ \Carbon\Carbon::parse($order->travel_date)->format('d M Y') }}
                </p>
                <p class="text-base text-gray-600 flex items-center">
                    <i class="ri-calendar-line text-indigo-500 mr-2"></i><strong>Booking Date:</strong> {{ $order->created_at->format('d M Y') }}
                </p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-user-line text-purple-500 mr-2"></i> <strong>Guide:</strong>
                    <span class="text-blue-600 font-semibold">{{ $order->guide ? $order->guide->name : 'Not Selected' }}</span>
                </p>
            </div>

            <!-- Cancel Booking Button -->
            @if (\Carbon\Carbon::parse($order->created_at)->diffInDays(\Carbon\Carbon::now()) <= 2 && $order->status != 'Cancelled')
                <div class="p-5">
                    <button data-action="{{ route('orders.cancel', $order->id) }}" class="cancel-booking-btn w-full bg-red-600 text-white py-2 rounded-md text-lg font-semibold hover:bg-red-700 transition duration-300">
                        Cancel Booking
                    </button>
                </div>
            @else
                <div class="p-5">
                    <button class="w-full bg-gray-400 text-white py-2 rounded-md text-lg font-semibold cursor-not-allowed">
                        Cancellation Not Allowed
                    </button>
                </div>
            @endif
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

<!-- Modal for Confirmation -->
<div id="cancelBookingModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 justify-center items-center flex">
    <div class="bg-white p-8 rounded-lg max-w-lg w-full space-y-4">
        <h3 class="text-2xl font-semibold text-gray-800">Cancel Booking</h3>
        <p class="text-gray-600">Are you sure you want to cancel this booking? This action cannot be undone.</p>
        <div class="flex justify-between">
            <button id="closeModal" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md">Cancel</button>
            <form id="cancelBookingForm" action="" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition duration-300">
                    Confirm Cancellation
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get modal elements
        const modal = document.getElementById('cancelBookingModal');
        const closeModal = document.getElementById('closeModal');
        const cancelButtons = document.querySelectorAll('.cancel-booking-btn');
        const cancelBookingForm = document.getElementById('cancelBookingForm');

        // Show modal
        cancelButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const actionUrl = this.getAttribute('data-action');
                cancelBookingForm.action = actionUrl; // Set form action dynamically
                modal.classList.remove('hidden');
            });
        });

        // Close modal
        closeModal.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        // Prevent modal from closing when clicked inside
        modal.querySelector('.bg-white').addEventListener('click', function (e) {
            e.stopPropagation();
        });

        // Close modal on clicking outside
        modal.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    });
</script>
@endsection
