@extends('layouts.app')
@section('title', 'Travellers')

@section('content')

<div class="container mx-auto px-6 py-10">
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Our Travellers</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">
        @foreach($users as $user)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out">
            <div class="p-6 bg-gradient-to-r from-blue-500 to-teal-500 text-white rounded-t-lg">
                <h3 class="text-2xl font-bold">
                    SN: {{ $loop->iteration }} - {{ $user->name }} <!-- Display serial number -->
                </h3>
            </div>

            <div class="p-6 bg-white">
                <!-- Moved Email, Address, and other info below the name -->
                <div class="flex items-center text-xl text-gray-700 mt-4">
                    <i class="ri-mail-line mr-2"></i>
                    <span><strong>Email:</strong> {{ $user->email }}</span>
                </div>

                <div class="flex items-center text-xl text-gray-700 mt-4">
                    <i class="ri-map-pin-2-line text-green-500 mr-2"></i>
                    <span><strong>Address:</strong> {{ $user->address }}</span>
                </div>

                <div class="flex items-center text-xl text-gray-700 mt-4">
                    <i class="ri-calendar-line text-yellow-500 mr-2"></i>
                    <span><strong>Joined:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</span>
                </div>

                <!-- Display the total number of bookings -->
                <div class="flex items-center text-xl text-gray-700 mt-4">
                    <i class="ri-ticket-2-line text-indigo-500 mr-2"></i>
                    <span><strong>Total Bookings:</strong> {{ $user->orders->count() }}</span>
                </div>
                <div class="flex items-center text-xl text-gray-700 mt-4">
                    <i class="ri-star-half-line text-lime-500 mr-2"></i>
                    <span><strong>Total Reviews:</strong> {{ $user->reviews->count() }}</span>
                </div>

                <!-- Display the user's travelled package -->
                <!-- @if($user->packages->isNotEmpty())
                <div class="flex items-center text-gray-700 mt-4">
                    <i class="ri-plane-line text-red-500 mr-2"></i>
                    <span><strong>Travelled Package:</strong> {{ $user->packages->first()->name }}</span>
                </div>
                @else
                <div class="text-gray-700 mt-4">
                    <strong>Travelled Package:</strong> N/A
                </div>
                @endif -->
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
