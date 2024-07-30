@extends('layouts.master')

@section('content')
<!-- Header -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('https://www.alphaadventuretreks.com/blog/wp-content/uploads/2023/07/Nepal-Tour-Packages-From-Malaysia-1.jpeg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-4xl md:text-6xl font-bold">Discover Your Next Adventure</h1>
        <p class="text-md md:text-xl mt-4">Experience the beauty of new places with our exclusive travel deals</p>
        <a href="{{ route('packages') }}" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105">Explore Packages</a>
        <a href="{{ route('destinations') }}" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105">Explore Destinations</a>
    </div>
</header>

<!-- Main Content -->
<div class="mt-20 bg-gray-100 py-12">
    <h2 class="text-4xl font-bold mb-6 text-center text-indigo-700">Welcome to YatraSathi</h2>
    <p class="text-xl text-center mb-10 text-gray-700">Your trusted travel companion for unforgettable journeys.</p>
    <!-- Featured Packages -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">Popular Packages</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($packages as $package)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $package->name }}</h3>
                        <p class="text-gray-700 mt-2">{{ Str::limit($package->description, 100) }}</p>
                        <p class="text-blue-500 font-bold text-lg mt-4">${{ $package->price }}</p>
                        <a href="{{ route('packages') }}" class="mt-4 inline-block bg-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-600 transition duration-300 ease-in-out transform hover:scale-105">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('packages') }}" class="mt-6 inline-block bg-yellow-500 text-black px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105">View All Packages</a>
        </div>
    </section>

    <!-- Top Destinations -->
    <section class="py-12 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">Top Destinations</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($destinations as $destination)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $destination->name }}</h3>
                        <p class="text-gray-700 mt-2">{{ Str::limit($destination->description, 100) }}</p>
                        <a href="{{ route('destinations') }}" class="mt-4 inline-block bg-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-600 transition duration-300 ease-in-out transform hover:scale-105">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('destinations') }}" class="mt-6 inline-block bg-yellow-500 text-black px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition duration-300 ease-in-out transform hover:scale-105">View All Destinations</a>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Testimonial 1 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600">"YatraSathi made our trip unforgettable! Highly recommend their services."</p>
                    <div class="mt-4 flex items-center">
                        <img src="https://via.placeholder.com/50" alt="Customer 1" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <p class="text-gray-900 font-bold">Customer 1</p>
                            <p class="text-gray-600 text-sm">Traveller</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600">"Amazing experience with YatraSathi. Everything was well organized."</p>
                    <div class="mt-4 flex items-center">
                        <img src="https://via.placeholder.com/50" alt="Customer 2" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <p class="text-gray-900 font-bold">Customer 2</p>
                            <p class="text-gray-600 text-sm">Adventurer</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600">"Best travel service ever! We had a great time thanks to YatraSathi."</p>
                    <div class="mt-4 flex items-center">
                        <img src="https://via.placeholder.com/50" alt="Customer 3" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <p class="text-gray-900 font-bold">Customer 3</p>
                            <p class="text-gray-600 text-sm">Explorer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
