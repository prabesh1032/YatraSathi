@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row lg:gap-10">
        <!-- Left Section -->
        <div class="lg:w-2/3">
            <div class="relative mb-8">
                <!-- Package Image -->
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}"
                     class="w-full h-80 rounded-lg shadow-lg object-cover">
                <!-- Badge -->
                <span class="absolute top-4 left-4 bg-green-600 text-white text-sm px-3 py-1 rounded-lg shadow-md">
                    Recommended
                </span>
            </div>

            <!-- Package Title -->
            <h1 class="text-5xl font-extrabold text-gray-800 mb-4">{{ $package->name }}</h1>
            <p class="text-lg text-gray-700 leading-relaxed mb-8">
                {{ $package->description }}
            </p>

            <!-- Importance Section -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-8 border border-gray-300">
                <h3 class="text-3xl font-semibold text-blue-700 mb-4">
                    Why {{ $package->name }} is Important to Nepal
                </h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    {{ $package->name }} holds immense cultural, spiritual, and natural significance in Nepal. Known for its breathtaking landscapes, {{ $package->name }} attracts travelers from all over the world who seek adventure and peace. Its serene valleys, majestic mountains, and vibrant local traditions make it a unique destination.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    With ancient temples, monasteries, and historical landmarks, {{ $package->name }} offers a glimpse into Nepal’s rich heritage and spiritual depth. Visiting here is more than sightseeing – it’s an experience of immersion in the essence of Nepal.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    From warm hospitality to sacred sites, {{ $package->name }} is a journey into the soul of Nepal. Perfect for adventurers, pilgrims, and peace-seekers alike.
                </p>
            </div>
        </div>

        <!-- Right Section -->
        <div class="lg:w-1/3 lg:h-auto">
            <div class="sticky top-20 bg-white rounded-lg shadow-lg p-6 border border-gray-200">
                <!-- Package Price -->
                <h2 class="text-4xl font-bold text-gray-800 mb-6">
                    <span class="text-green-600">USD {{ $package->price }}</span>
                </h2>
                <p class="text-gray-600 text-lg flex items-center mb-6">
                    <i class="ri-time-line text-blue-600 mr-2"></i>
                    {{ $package->duration }} Nights {{ $package->duration + 1 }} Days for {{ $package->people}} People.
                </p>

                <!-- Buttons -->
                <a href="{{ route('packages.show', $package->id) }}"
                   class="bg-blue-600 text-white text-center py-3 px-4 rounded-lg shadow-md block mb-4 hover:bg-blue-700 transition">
                    Book Now
                </a>
                <a href="{{ route('traveltips') }}"
                   class="bg-green-600 text-white text-center py-3 px-4 rounded-lg shadow-md block mb-6 hover:bg-green-700 transition">
                    Tips for Travel
                </a>

                <!-- What's Included Section -->
                <div class="bg-gray-50 p-4 rounded-lg shadow mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">What's Included:</h3>
                    <ul class="list-disc pl-5 text-gray-700">
                        <li>Accommodation for {{ $package->duration }} nights</li>
                        <li>Guided tours of key locations</li>
                        <li>All meals included</li>
                        <li>Transportation to and from destinations</li>
                    </ul>
                </div>

                <!-- Contact Section -->
                
            </div>
        </div>
    </div>
</div>
@endsection
