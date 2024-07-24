@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg shadow-lg
     transform transition-transform hover:scale-105">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white mb-2">Destinations</h2>
            <i class="ri-map-pin-line text-3xl text-white"></i>
        </div>
        <p class="text-white">Manage your travel destinations and details.</p>
        <a href="{{ route('destinations.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500
         text-black font-bold rounded-full hover:bg-yellow-600 text-center">Manage Destinations</a>
    </div>
    <div class="bg-gradient-to-r from-purple-400 to-pink-500 p-6 rounded-lg shadow-lg transform
        transition-transform hover:scale-105">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white mb-2">Packages</h2>
            <i class="ri-suitcase-line text-3xl text-white"></i>
        </div>
        <p class="text-white">Create and manage travel packages for customers.</p>
        <a href="{{ route('packages.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full
         hover:bg-yellow-600 text-center">Manage Packages</a>
    </div>
    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-6 rounded-lg shadow-lg transform
        transition-transform hover:scale-105">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white mb-2">Bookings</h2>
            <i class="ri-book-line text-3xl text-white"></i>
        </div>
        <p class="text-white">View and manage customer bookings.</p>
        <a href="{{ route('bookings.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full
         hover:bg-yellow-600 text-center">Manage Bookings</a>
    </div>
    <div class="bg-gradient-to-r from-red-400 to-pink-500 p-6 rounded-lg shadow-lg transform
        transition-transform hover:scale-105">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white mb-2">Reviews</h2>
            <i class="ri-star-line text-3xl text-white"></i>
        </div>
        <p class="text-white">Read and respond to customer reviews.</p>
        <a href="#" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full
         hover:bg-yellow-600 text-center">Manage Reviews</a>
    </div>
    <div class="bg-gradient-to-r from-blue-400 to-purple-500 p-6 rounded-lg shadow-lg transform
        transition-transform hover:scale-105">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white mb-2">Travellers</h2>
            <i class="ri-user-line text-3xl text-white"></i>
        </div>
        <p class="text-white">Manage traveller accounts and roles.</p>
        <a href="#" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full
         hover:bg-yellow-600 text-center">Manage Travellers</a>
    </div>
</div>
@endsection
