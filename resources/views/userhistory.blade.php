@extends('layouts.master')

@section('content')
<header class="relative w-full bg-cover bg-center overflow-hidden"
    style="height: 280px; background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0"
        style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);">
    </div>
    <div class="relative h-full flex flex-col justify-center items-center text-center px-4">
        <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            ✦ YatraSathi
        </span>
        <h1 class="text-white font-semibold leading-tight mb-3"
            style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
            Your Booking History
        </h1>
        <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Relive the moments and manage your bookings effortlessly.
        </p>
    </div>
</header>

<div class="w-full bg-gray-50 py-12">
    <div class="container mx-auto px-4">

        @if ($orders->isEmpty())
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 -mt-20 relative z-10 text-center py-16 px-4">
            <img src="{{ asset('notfound.jpg') }}" alt="No Bookings Found" class="w-1/3 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-blue-900">No Booking History Yet</h2>
            <p class="text-gray-500 mt-2 max-w-md mx-auto">It looks like your travel adventures are yet to begin. Discover exciting destinations and start your journey today!</p>
            <a href="{{ route('packages') }}" class="mt-6 inline-flex items-center bg-orange-500 text-white px-6 py-3 rounded-lg text-base font-semibold shadow-sm hover:bg-orange-600 transition-colors duration-200">
                <i class="ri-flight-takeoff-line mr-2"></i>Explore Packages
            </a>
        </div>
        @else
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 -mt-20 relative z-10 overflow-hidden">

            <!-- Scroll hint (mobile) -->
            <div class="flex items-center justify-between px-5 py-3 border-b border-gray-100 md:hidden">
                <span class="text-sm font-semibold text-blue-900">{{ $orders->count() }} {{ $orders->count() == 1 ? 'Booking' : 'Bookings' }}</span>
                <span class="text-xs text-gray-400 flex items-center">
                    Scroll for more <i class="ri-arrow-right-line ml-1"></i>
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-blue-50 text-blue-900 text-xs font-semibold uppercase tracking-wide">
                            <th class="px-5 py-4 text-left whitespace-nowrap">Package</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Customer</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Contact</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Travelers</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Duration</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Travel Date</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Booked On</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Guide</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Payment</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Total</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Status</th>
                            <th class="px-5 py-4 text-left whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($orders as $order)
                        @php
                            $imagePath = $order->is_custom_package
                                ? (App\Models\Destination::find($order->package_id ?? 1)->photopath ?? 'default.jpg')
                                : ($order->package->photopath ?? 'default.jpg');
                            $canCancel = \Carbon\Carbon::parse($order->created_at)->diffInDays(\Carbon\Carbon::now()) <= 2 && $order->status != 'Cancelled';
                        @endphp
                        <tr class="hover:bg-orange-50/40 transition-colors duration-150">
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('images/' . $imagePath) }}" alt="Package" class="w-10 h-10 rounded-lg object-cover border border-gray-100">
                                    <span class="font-semibold text-gray-900">
                                        {{ $order->is_custom_package ? $order->custom_package_name : ($order->package->package_name ?? 'Package') }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-gray-700">
                                <div class="flex items-center">
                                    <i class="ri-user-line text-orange-500 mr-1.5"></i>{{ $order->name }}
                                </div>
                                <div class="text-xs text-gray-400 flex items-center mt-0.5">
                                    <i class="ri-map-pin-line mr-1.5"></i>{{ $order->address }}
                                </div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-gray-700">{{ $order->phone }}</td>
                            <td class="px-5 py-4 whitespace-nowrap text-gray-700">
                                <i class="ri-group-line text-orange-500 mr-1.5"></i>{{ $order->num_people }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-gray-700">{{ $order->duration }} days</td>
                            <td class="px-5 py-4 whitespace-nowrap text-gray-700">{{ \Carbon\Carbon::parse($order->travel_date)->format('d M Y') }}</td>
                            <td class="px-5 py-4 whitespace-nowrap text-gray-700">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="px-5 py-4 whitespace-nowrap text-blue-900 font-medium">{{ $order->guide ? $order->guide->name : 'Not Selected' }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <span class="bg-orange-100 text-orange-600 text-xs font-bold py-1 px-2.5 rounded-full">{{ $order->payment_method }}</span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap font-bold text-green-600">${{ $order->total_price }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <span class="bg-blue-900 text-white text-xs font-bold py-1 px-2.5 rounded-full">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                @if ($canCancel)
                                <button data-action="{{ route('orders.cancel', $order->id) }}" class="cancel-booking-btn bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors duration-150">
                                    Cancel
                                </button>
                                @else
                                <span class="bg-gray-100 text-gray-400 px-3 py-1.5 rounded-lg text-xs font-semibold cursor-not-allowed">
                                    Locked
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</div>

<!-- Modal for Confirmation -->
<div id="cancelBookingModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex justify-center items-center px-4">
    <div class="bg-white p-8 rounded-2xl max-w-lg w-full space-y-4 shadow-xl">
        <h3 class="text-2xl font-bold text-blue-900">Cancel Booking</h3>
        <p class="text-gray-500">Are you sure you want to cancel this booking? This action cannot be undone.</p>
        <div class="flex justify-end gap-3">
            <button id="closeModal" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg font-semibold hover:bg-gray-200 transition-colors duration-150">Cancel</button>
            <form id="cancelBookingForm" action="" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-red-700 transition-colors duration-150">
                    Confirm Cancellation
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('cancelBookingModal');
        const closeModal = document.getElementById('closeModal');
        const cancelButtons = document.querySelectorAll('.cancel-booking-btn');
        const cancelBookingForm = document.getElementById('cancelBookingForm');

        cancelButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                cancelBookingForm.action = this.getAttribute('data-action');
                modal.classList.remove('hidden');
            });
        });

        closeModal.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
@endsection
