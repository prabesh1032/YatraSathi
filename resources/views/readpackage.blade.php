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
            <div class="bg-gray-50 p-6 rounded-lg shadow-lg mb-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">About this Activity</h3>

                <!-- Free cancellation -->
                <div class="flex items-start mb-4">
                    <i class="ri-refresh-line text-blue-500 text-3xl mr-4"></i>
                    <div>
                        <span class="text-lg font-medium">Free cancellation:</span>
                        <p class="text-gray-600 text-base">Cancel booking up to 24 hours in advance for a full refund.</p>
                    </div>
                </div>

                <!-- Reserve now & pay later -->
                <div class="flex items-start mb-4">
                    <i class="ri-wallet-2-line text-green-500 text-3xl mr-4"></i>
                    <div>
                        <span class="text-lg font-medium">Reserve now & pay later:</span>
                        <p class="text-gray-600 text-base">Keep your travel plans flexible — book your spot and pay nothing today.</p>
                    </div>
                </div>
                <!-- Starting Location -->
                <div class="flex items-start mb-4">
                    <i class="ri-map-pin-2-line text-red-500 text-3xl mr-4"></i>
                    <div>
                        <span class="text-lg font-medium">Starting Location:</span>
                        <p class="text-gray-600 text-base">{{ $package->starting_location }}.</p>
                    </div>
                </div>

                <!-- More Info About the Package -->
                <div class="flex items-start mb-4">
                    <i class="ri-information-line text-orange-500 text-3xl mr-4"></i>
                    <div>
                        <span class="text-lg font-medium">More Information:</span>
                        <p class="text-gray-600 text-base">This package includes unique experiences like hiking, sightseeing tours, and much more.</p>
                    </div>
                </div>
            </div>
            <!-- Importance Section -->
            <div class=" p-6 rounded-lg shadow-lg mb-8 border border-gray-300">
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
            <div class="sticky top-28 bg-white rounded-lg shadow-lg p-6 border border-gray-200">
                <!-- Package Price -->
                <div class="flex items-center space-x-3 mb-4">
                    <i class="ri-wallet-line text-gray-800 text-2xl"></i>
                    <h2 class="text-xl font-bold text-gray-800">
                        Daily Charge Per Person:
                        <span class="text-green-600">Rs.{{ $package->price }}</span>
                    </h2>
                </div>

                <!-- Package Duration and People -->
                <p class="text-gray-900 text-lg font-bold flex items-center mb-4 ">
                    <i class="ri-time-line text-blue-600 mr-2"></i>
                    Minimum stay: {{ $package->duration }} Nights / {{ $package->duration + 1 }} Days.
                </p>

                <div class="grid grid-rows-2 gap-4">
                    <!-- Row 1 -->
                    <div class="flex justify-between space-x-4 ">
                        <a href="{{ route('packages.show', $package->id) }}"
                            class="flex items-center justify-center bg-blue-500 text-white text-center py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition transform hover:scale-105">
                            <i class="ri-shopping-cart-line mr-4"></i> Book Now
                        </a>
                        <a href="{{ route('traveltips') }}"
                            class="flex items-center justify-center bg-green-500 text-white text-center py-3 px-4 rounded-lg shadow-md hover:bg-green-600 transition transform hover:scale-105">
                            <i class="ri-lightbulb-line mr-4"></i> Tips for Travel
                        </a>
                    </div>

                    <!-- Row 2 -->
                    <div class="flex justify-center mb-4">
                        <a href="{{ route('route.show') }}"
                            class="flex items-center justify-center bg-indigo-500 text-white text-center py-3 px-4 rounded-lg shadow-md hover:bg-indigo-600 transition transform hover:scale-105">
                            <i class="ri-map-pin-line mr-2"></i> View Package on Map
                        </a>
                    </div>
                </div>
                <!-- Contact Section -->
                <div class="p-4 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                        <i class="ri-information-line text-blue-500 mr-2"></i> Contact for More Information
                    </h3>
                    <p class="text-gray-700 mb-4">For inquiries or further details, please contact us directly.</p>
                    <div class="flex space-x-5">
                    <!-- Facebook -->
                    <a href="https://facebook.com/prabesh.ach" class="text-blue-600 hover:text-blue-500">
                        <i class="ri-facebook-line ri-2x"></i>
                    </a>
                    <!-- Twitter -->
                    <a href="https://twitter.com/PrabeshAch33319" class="text-blue-400 hover:text-blue-300">
                        <i class="ri-twitter-line ri-2x"></i>
                    </a>
                    <!-- Instagram -->
                    <a href="https://instagram.com/prabesh_ach" class="text-pink-500 hover:text-pink-400">
                        <i class="ri-instagram-line ri-2x"></i>
                    </a>
                    <!-- Email -->
                    <a href="mailto:prabesh11100@gmail.com" class="text-gray-700 hover:text-gray-600">
                        <i class="ri-mail-line ri-2x"></i>
                    </a>
                    <!-- Phone -->
                    <a href="tel:+9779812965110" class="text-green-500 hover:text-green-400">
                        <i class="ri-phone-line ri-2x"></i>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
