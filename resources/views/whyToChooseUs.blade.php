@extends('layouts.master')

@section('content')
<section id="why-us" class="py-16 bg-gradient-to-b from-white to-indigo-50">
    <div class="container mx-auto px-6 lg:px-16">
        <div class="text-center mb-12">
            <h2 class="text-5xl font-extrabold text-indigo-700 mb-4">Why Choose YatraSathi?</h2>
            <p class="text-lg text-gray-700">We go beyond expectations to make your travel dreams a reality. Here's what sets us apart.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <ul class="space-y-6 text-lg text-gray-700">
                    <li class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-full shadow-md mr-4">
                            <i class="ri-global-line text-indigo-700 text-3xl"></i>
                        </div>
                        <span>Explore exclusive travel deals tailored to your needs.</span>
                    </li>
                    <li class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-full shadow-md mr-4">
                            <i class="ri-compass-3-line text-indigo-700 text-3xl"></i>
                        </div>
                        <span>Get personalized itinerary planning for a seamless journey.</span>
                    </li>
                    <li class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-full shadow-md mr-4">
                            <i class="ri-customer-service-2-line text-indigo-700 text-3xl"></i>
                        </div>
                        <span>24/7 customer support to assist you every step of the way.</span>
                    </li>
                    <li class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-full shadow-md mr-4">
                            <i class="ri-user-star-line text-indigo-700 text-3xl"></i>
                        </div>
                        <span>Trusted by thousands of happy travelers worldwide.</span>
                    </li>
                    <li class="flex items-center">
                        <div class="bg-indigo-100 p-3 rounded-full shadow-md mr-4">
                            <i class="ri-shield-star-line text-indigo-700 text-3xl"></i>
                        </div>
                        <span>Reliable travel insurance for a worry-free experience.</span>
                    </li>
                </ul>
            </div>

            <!-- Right Image -->
            <a href="{{ route('packages') }}"div class="relative">
                <img src="{{ asset('pokhara.jpg') }}" alt="Why Choose Us" class="rounded-lg shadow-lg transition duration-300 ease-in-out hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30 rounded-lg"></div>
                <div class="absolute bottom-4 left-4 text-white text-lg">
                <h3 class="font-bold text-2xl">Discover Popular Packages</h3>
                    <p class="text-sm">Breathtaking views, adventure, and a seamless journey.</p>
                </div>
            </div></a>
        </div>

        <!-- Stats Section -->
        <div class="mt-16 bg-indigo-700 text-white py-10 rounded-lg shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <h3 class="text-5xl font-bold">50+</h3>
                    <p class="mt-2 text-lg">Travel Packages</p>
                </div>
                <div>
                    <h3 class="text-5xl font-bold">10k+</h3>
                    <p class="mt-2 text-lg">Happy Travelers</p>
                </div>
                <div>
                    <h3 class="text-5xl font-bold">100+</h3>
                    <p class="mt-2 text-lg">Destinations</p>
                </div>
                <div>
                    <h3 class="text-5xl font-bold">24/7</h3>
                    <p class="mt-2 text-lg">Customer Support</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
