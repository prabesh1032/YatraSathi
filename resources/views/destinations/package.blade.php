@extends('layouts.master')

@section('title', $destination->name . ' - Packages')

@section('content')
<!-- Hero Section -->
<header class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white px-4">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-400 drop-shadow-lg mb-4">
            {{ $destination->name }}
        </h1>
        <p class="text-xl md:text-2xl mb-6 font-medium">
            Discover amazing packages for your perfect getaway
        </p>
        @if($destination->description)
            <p class="text-lg opacity-90 max-w-2xl">
                {{ Str::limit($destination->description, 150) }}
            </p>
        @endif
    </div>
</header>

<!-- Packages Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <!-- Navigation Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
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

        <!-- Section Title -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-4 flex items-center justify-center">
                <i class="ri-gift-line text-indigo-600 mr-3"></i>
                Available Packages
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-4">
                Choose from our carefully curated packages for {{ $destination->name }}
            </p>
            <span class="inline-block bg-indigo-100 text-indigo-800 text-lg font-bold px-6 py-2 rounded-full">
                {{ $packages->count() }} {{ $packages->count() == 1 ? 'Package' : 'Packages' }} Available
            </span>
        </div>

        @if($packages->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($packages as $package)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group">
                        <!-- Package Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($package->photopath)
                                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-400 to-purple-600 flex items-center justify-center">
                                    <i class="ri-image-line text-6xl text-white opacity-50"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4">
                                <span class="bg-yellow-500 text-black px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                    ${{ $package->package_price }}
                                </span>
                            </div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $package->duration }} Days
                                </span>
                            </div>
                        </div>

                        <!-- Package Content -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
                                {{ $package->package_name }}
                            </h3>

                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                {{ Str::limit($package->package_description, 120) }}
                            </p>

                            <!-- Package Features -->
                            <div class="space-y-3 mb-6">
                                @if($package->transportation)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-bus-line text-indigo-600"></i>
                                        </div>
                                        <span>{{ $package->transportation }}</span>
                                    </div>
                                @endif
                                @if($package->accommodation)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-hotel-line text-green-600"></i>
                                        </div>
                                        <span>{{ $package->accommodation }}</span>
                                    </div>
                                @endif
                                @if($package->meals)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-restaurant-line text-orange-600"></i>
                                        </div>
                                        <span>{{ $package->meals }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Section -->
                            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                <a href="{{ route('packages.read', $package->id) }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-300 flex items-center transform hover:scale-105">
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
            <div class="text-center py-16">
                <div class="max-w-lg mx-auto bg-white rounded-xl shadow-lg p-8">
                    <div class="mb-6">
                        <i class="ri-inbox-line text-8xl text-gray-400 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-700 mb-3">No Packages Available</h3>
                        <p class="text-gray-600 leading-relaxed">
                            We're currently working on exciting packages for {{ $destination->name }}.
                            Check back soon or explore our other amazing destinations!
                        </p>
                    </div>
                    <div class="space-y-4">
                        <a href="{{ route('destinations.public') }}" class="block w-full bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-300">
                            <i class="ri-arrow-left-line mr-2"></i>
                            Browse Other Destinations
                        </a>
                        <a href="{{ route('home') }}" class="block w-full bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-colors duration-300">
                            <i class="ri-home-line mr-2"></i>
                            Go Home
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Back Navigation -->
        <div class="text-center mt-16">
            <a href="{{ route('destinations.public') }}" class="inline-flex items-center bg-gray-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-gray-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <i class="ri-arrow-left-line mr-2"></i>
                Back to All Destinations
            </a>
        </div>
    </div>
</section>
@endsection
