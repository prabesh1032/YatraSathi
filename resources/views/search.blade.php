@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-6xl font-extrabold text-gray-900 mb-4">Search Results for <span class="text-yellow-500">"{{ $qry }}"</span></h1>
        <p class="text-xl text-gray-600">Explore the best travel packages crafted just for you.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
        @forelse($packages as $package)
        <div class="relative bg-white shadow-lg rounded-xl overflow-hidden transition-all duration-500 hover:shadow-2xl transform hover:scale-105 group">
            <!-- Image Section -->
            @if($package->photopath)
                <a href="{{ route('packages.read', $package->id) }}">
                    <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                </a>
            @endif
            <div class="p-6">
                <!-- Package Name -->
                <a href="{{ route('packages.read', $package->id) }}" class="block text-3xl font-semibold text-gray-800 hover:text-indigo-600 transition-colors duration-300">
                    {{ $package->name }}
                </a>
                <!-- Package Location -->
                <p class="text-lg text-gray-600 mt-2 flex items-center">
                    <i class="ri-map-pin-line text-indigo-500 mr-2"></i> {{ $package->location }}
                </p>
                <!-- Package Duration -->
                <p class="text-lg text-gray-600 mt-2 flex items-center">
                    <i class="ri-calendar-line text-indigo-500 mr-2"></i> {{ $package->duration }} days
                </p>
                <!-- Price and CTA -->
                <div class="flex justify-between items-center mt-4">
                    <span class="text-xl font-bold text-indigo-600">${{ $package->price }} <span class="text-sm text-gray-500">Per Person</span></span>
                </div>
                <div class="flex space-x-4 mt-4">
                    <a href="{{ route('packages.read', $package->id) }}" class="bg-indigo-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">Learn More</a>
                    <a href="{{ route('packages.show', $package->id) }}" class="bg-green-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-green-700 transition-all duration-300 transform hover:scale-105">Explore</a>
                </div>
            </div>
        </div>
        @empty
        <!-- No Results Section -->
        <div class="col-span-full text-center">
            <img src="{{ asset('notfound.jpg') }}" alt="No Results Found" class="mx-auto w-1/3 h-auto mb-6">
            <h2 class="text-4xl font-bold text-gray-500">No Packages Found</h2>
            <p class="text-lg text-gray-600 mt-4">Try adjusting your search or explore our <a href="{{ route('packages') }}" class="text-indigo-600 font-bold hover:underline">available packages</a>.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
