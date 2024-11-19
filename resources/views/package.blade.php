@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Explore Our Packages</h1>
        <p class="mt-2 text-gray-600">Discover the beauty of Nepal with our curated travel packages.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($packages as $package)
        <div class="bg-indigo-100 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <!-- Make the image clickable -->
            @if($package->photopath)
                <a href="{{ route('packages.read', $package->id) }}">
                    <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                </a>
            @endif
            <div class="p-4">
                <!-- Make the package name clickable -->
                <a href="{{ route('packages.read', $package->id) }}" class="text-xl font-bold text-gray-900 hover:text-yellow-500">
                    <h3>{{ $package->name }}</h3>
                </a>
                <!-- Description and details -->
                <p class="text-gray-700 mt-2"><i class="ri-map-pin-line"></i> Location: {{ $package->location }}</p>
                <p class="text-gray-700 mt-2"><i class="ri-calendar-line"></i> Duration: {{ $package->duration }} days</p>
                <p class="text-gray-700 mt-2"><i class="ri-group-line"></i> People: {{ $package->people }}</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-blue-500 font-bold text-lg">${{ $package->price }}</span>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('packages.read', $package->id) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-600">Read More</a>
                        <a href="{{ route('packages.show', $package->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
