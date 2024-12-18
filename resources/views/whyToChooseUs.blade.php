@extends('layouts.master')

@section('content')
<section id="why-us" class="py-16 bg-gradient-to-b from-white to-indigo-50">
    <div class="container mx-auto px-6 lg:px-16">

        <!-- Section Title -->
        <div class="text-center mb-12">
            <h2 class="text-5xl font-extrabold text-indigo-700 mb-4 tracking-tight">Why Choose <span class="text-yellow-500">YatraSathi?</span></h2>
            <p class="text-lg text-gray-600">We go beyond expectations to turn your travel dreams into reality.</p>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content with Hover Effect -->
            <div>
                <ul class="space-y-6 text-lg text-gray-700">
                    @foreach([
                        ['ri-global-line', 'Explore exclusive travel deals tailored to your needs.'],
                        ['ri-compass-3-line', 'Get personalized itinerary planning for a seamless journey.'],
                        ['ri-customer-service-2-line', '24/7 customer support to assist you every step of the way.'],
                        ['ri-user-star-line', 'Trusted by thousands of happy travelers worldwide.'],
                        ['ri-shield-star-line', 'Reliable travel insurance for a worry-free experience.'],
                        ['ri-flight-takeoff-line', 'Flexible and budget-friendly travel plans.']
                    ] as $feature)
                    <li class="flex items-center group">
                        <div class="bg-indigo-100 p-4 rounded-full shadow-md mr-4 transition-transform duration-300 group-hover:scale-125 group-hover:bg-indigo-500">
                            <i class="{{ $feature[0] }} text-indigo-700 text-3xl group-hover:text-white"></i>
                        </div>
                        <span class="group-hover:text-indigo-500 transition-colors duration-300">{{ $feature[1] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Right Content with Image and Link -->
            <a href="{{ route('packages') }}" class="relative group">
                <img src="{{ asset('pokhara.jpg') }}" alt="Why Choose Us"
                    class="rounded-lg shadow-2xl transition-transform duration-500 ease-in-out group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-40 rounded-lg"></div>
                <div class="absolute bottom-6 left-6 text-white">
                    <h3 class="font-bold text-3xl mb-1 group-hover:text-yellow-400 transition-colors duration-300">Explore Popular Packages</h3>
                    <p class="text-sm">Breathtaking views, adventure, and seamless experiences await!</p>
                </div>
            </a>
        </div>

        <!-- Stats Section -->
        <div class="mt-16 bg-indigo-700 text-white py-12 rounded-lg shadow-lg">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="group">
                    <h3 class="text-5xl font-bold group-hover:text-yellow-400 transition-colors duration-300">50+</h3>
                    <p class="mt-2 text-lg">Travel Packages</p>
                </div>
                <div class="group">
                    <h3 class="text-5xl font-bold group-hover:text-yellow-400 transition-colors duration-300">10k+</h3>
                    <p class="mt-2 text-lg">Happy Travelers</p>
                </div>
                <div class="group">
                    <h3 class="text-5xl font-bold group-hover:text-yellow-400 transition-colors duration-300">100+</h3>
                    <p class="mt-2 text-lg">Destinations</p>
                </div>
                <div class="group">
                    <h3 class="text-5xl font-bold group-hover:text-yellow-400 transition-colors duration-300">24/7</h3>
                    <p class="mt-2 text-lg">Customer Support</p>
                </div>
            </div>
        </div>

        <section class="bg-gray-900 text-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-extrabold mb-4">
                    Experience Unforgettable <span class="text-yellow-500">Adventures
                </h2>
                <p class="text-lg mb-8 text-gray-300">
                    Discover breathtaking destinations and create lifelong memories.
                </p>

                <!-- Carousel / Slider -->
                <div class="relative w-full lg:w-8/12 mx-auto overflow-hidden rounded-lg shadow-lg">
                    <div class="carousel flex transition-transform duration-500 ease-in-out">
                        <!-- Slide 1 -->
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('rafting.jpg') }}" alt="Adventure Image 1" class="w-full h-64 object-cover">
                        </div>
                        <!-- Slide 2 -->
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('localculture.jpg') }}" alt="Adventure Image 2" class="w-full h-64 object-cover">
                        </div>
                        <!-- Slide 3 -->
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('safari.jpg') }}" alt="Adventure Image 3" class="w-full h-64 object-cover">
                        </div>
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('lake.png') }}" alt="Adventure Image 2" class="w-full h-64 object-cover">
                        </div>
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('aboutus.jpg') }}" alt="Adventure Image 2" class="w-full h-64 object-cover">
                        </div>
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('contact-bg.jpg') }}" alt="Adventure Image 2" class="w-full h-64 object-cover">
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <a href="{{ route('packages') }}"
                    class="mt-6 inline-block bg-yellow-500 text-gray-900 font-bold px-6 py-3 rounded-full shadow-md hover:bg-yellow-600 transition duration-300">
                    Start Your Journey
                </a>
            </div>
        </section>

        <!-- Carousel Script -->
        <script>
            const carousel = document.querySelector('.carousel');
            let currentIndex = 0;

            setInterval(() => {
                currentIndex = (currentIndex + 1) % 6; // Assuming 6 slides
                const offset = -currentIndex * 100;
                carousel.style.transform = `translateX(${offset}%)`;
            }, 3000); // Auto-slide every 3 seconds
        </script>

    </div>
</section>
@endsection
