@extends('layouts.master')

@section('title', $destination->name . ' - Packages')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Destination Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-700 rounded-2xl shadow-xl overflow-hidden mb-8">
        <div class="relative h-64 md:h-80">
            @if($destination->photopath)
                <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-indigo-400 to-purple-600 flex items-center justify-center">
                    <i class="ri-map-pin-line text-8xl text-white opacity-50"></i>
                </div>
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="text-center text-white">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $destination->name }}</h1>
                    <p class="text-xl md:text-2xl opacity-90">Explore Amazing Packages</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('destinations.public') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                    <i class="ri-home-line mr-2"></i>
                    Destinations
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="ri-arrow-right-s-line text-gray-400"></i>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $destination->name }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Destination Description -->
    @if($destination->description)
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">About {{ $destination->name }}</h2>
        <p class="text-gray-600 leading-relaxed">{{ $destination->description }}</p>
    </div>
    @endif

    <!-- Packages Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="ri-gift-line text-indigo-600 mr-3"></i>
            Available Packages
            <span class="ml-3 bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">{{ $packages->count() }} packages</span>
        </h2>

        @if($packages->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($packages as $package)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <!-- Package Image -->
                        <div class="relative h-48">
                            @if($package->photopath)
                                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center">
                                    <i class="ri-image-line text-4xl text-white opacity-50"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4">
                                <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    ${{ $package->package_price }}
                                </span>
                            </div>
                        </div>

                        <!-- Package Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $package->package_name }}</h3>

                            <div class="flex items-center text-gray-600 mb-3">
                                <i class="ri-time-line mr-2"></i>
                                <span class="text-sm">{{ $package->duration }} days</span>
                            </div>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($package->package_description, 120) }}
                            </p>

                            <!-- Package Features -->
                            <div class="space-y-2 mb-4">
                                @if($package->transportation)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="ri-bus-line mr-2 text-indigo-600"></i>
                                        <span>{{ $package->transportation }}</span>
                                    </div>
                                @endif
                                @if($package->accommodation)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="ri-hotel-line mr-2 text-indigo-600"></i>
                                        <span>{{ $package->accommodation }}</span>
                                    </div>
                                @endif
                                @if($package->meals)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="ri-restaurant-line mr-2 text-indigo-600"></i>
                                        <span>{{ $package->meals }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Button -->
                            <div class="flex justify-between items-center">
                                <a href="{{ route('packages.show', $package->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-300 flex items-center">
                                    <i class="ri-eye-line mr-2"></i>
                                    View Details
                                </a>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-indigo-600">${{ $package->package_price }}</div>
                                    <div class="text-xs text-gray-500">per person</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- No Packages Message -->
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <i class="ri-inbox-line text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Packages Available</h3>
                    <p class="text-gray-500 mb-6">We're currently working on exciting packages for {{ $destination->name }}. Check back soon!</p>
                    <a href="{{ route('destinations.public') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-300">
                        <i class="ri-arrow-left-line mr-2"></i>
                        Browse Other Destinations
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Back to Destinations -->
    <div class="text-center">
        <a href="{{ route('destinations.public') }}" class="bg-gray-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-700 transition-colors duration-300 inline-flex items-center">
            <i class="ri-arrow-left-line mr-2"></i>
            Back to All Destinations
        </a>
    </div>
</div>
@endsection
