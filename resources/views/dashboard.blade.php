@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Destinations Card -->
    <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Destinations</h2>
            <i class="ri-map-pin-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">Manage your travel destinations and details.</p>
        <a href="#" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 text-center transition-all">Manage Destinations</a>
    </div>

    <!-- Packages Card -->
    <div class="bg-gradient-to-r from-purple-400 to-pink-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Packages</h2>
            <i class="ri-suitcase-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">Create and manage travel packages for customers.</p>
        <a href="{{ route('packages.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 text-center transition-all">Manage Packages</a>
    </div>

    <!-- Bookings Card -->
    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Bookings</h2>
            <i class="ri-book-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">View and manage customer bookings.</p>
        <a href="#" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 text-center transition-all">Manage Bookings</a>
    </div>

    <!-- Reviews Card -->
    <div class="bg-gradient-to-r from-red-400 to-pink-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Reviews</h2>
            <i class="ri-star-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">Read and respond to customer reviews.</p>
        <a href="#" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 text-center transition-all">Manage Reviews</a>
    </div>

    <!-- Travellers Card -->
    <div class="bg-gradient-to-r from-blue-400 to-purple-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Travellers</h2>
            <i class="ri-user-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">Manage traveller accounts and roles.</p>
        <a href="#" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 text-center transition-all">Manage Travellers</a>
    </div>
</div>
<!-- Recent Activities Section -->

@endsection
