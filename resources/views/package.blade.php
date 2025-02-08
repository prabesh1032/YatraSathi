@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-6">
        <h1 class="text-6xl font-extrabold z-10 text-gray-900 mb-4">Explore Our Curated Travel <span class="text-yellow-500">Packages</span></h1>
        <p class="text-xl text-gray-600">Explore Nepal's most iconic destinations, where beauty meets adventure.</p>
    </div>
    <!-- Airplane Animation -->
    <div id="airplane" class="absolute top-20 left-0 z-10">
        <img src="{{ asset('plane.png') }}" alt="Flying Airplane" class="w-16 h-16" />
        <style>
            #airplane {
                position: absolute;
                top: 170px;
                left: 0;
                animation: fly 5s linear infinite;
            }

            @keyframes fly {
                0% {
                    left: -10%;
                }
                100% {
                    left: 110%;
                }
            }
        </style>

        <script>
            window.onload = function() {
                const airplane = document.getElementById('airplane');
                airplane.style.animationPlayState = 'running'; // Starts the flying animation when the page loads
            };
        </script>
    </div>

   <!-- Sort by Dropdown -->
<div class="mb-6 font-extrabold text-gray-900">
    <form method="GET" action="{{ route('packages') }}" id="sortForm">
        <select name="sort_by" class="px-4 py-3 w-48 border border-gray-300 rounded-md text-gray-700 font-medium bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-md transition-all duration-300 ease-in-out transform hover:scale-105" onchange="document.getElementById('sortForm').submit();">
            <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
            <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
            <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Latest</option>
            <option value="shortest" {{ request('sort_by') == 'shortest' ? 'selected' : '' }}>Shortest Duration</option>
            <option value="longest" {{ request('sort_by') == 'longest' ? 'selected' : '' }}>Longest Duration</option>
        </select>
    </form>
</div>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
        @foreach($packages as $package)
        <div class="relative bg-white shadow-lg rounded-xl overflow-hidden transition-all duration-500 hover:shadow-2xl transform hover:scale-105 group">
            <!-- Image Section -->
            @if($package['photopath'])
                <a href="{{ route('packages.read', $package['id']) }}">
                    <img src="{{ asset('images/' . $package['photopath']) }}" alt="{{ $package['name'] }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                </a>
            @endif
            <div class="p-6">
                <a href="{{ route('packages.read', $package['id']) }}" class="block text-3xl font-semibold text-gray-800 hover:text-indigo-600 transition-colors duration-300">
                    {{ $package['name'] }}
                </a>
                <p class="text-lg text-gray-600 mt-2 flex items-center">
                    <i class="ri-map-pin-line text-indigo-500 mr-2"></i> {{ $package['location'] }}
                </p>
                <p class="text-lg text-gray-600 mt-2 flex items-center">
                    <i class="ri-calendar-line text-indigo-500 mr-2"></i> {{ $package['duration'] }} days
                </p>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-xl font-bold text-indigo-600">${{ $package['price'] }} <span class="text-sm text-gray-500">Per Person</span></span>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('packages.read', $package['id']) }}" class="bg-indigo-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">Learn More</a>
                    <a href="{{ route('packages.show', $package['id']) }}" class="bg-green-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-green-700 transition-all duration-300 transform hover:scale-105">Explore</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
