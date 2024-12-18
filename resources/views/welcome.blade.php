@extends('layouts.master')

@section('content')
<!-- Header Section -->
<header class="relative h-screen w-full bg-cover bg-center" style="background-image: url('{{ asset('home.jpeg') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-70"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-5xl text-black font-extrabold mb-4 animate-bounce">Explore.Dream.Discover.</h1>
        <p class="text-xl md:text-2xl mb-6">Let us take you places you’ve never been</p>
        <a href="{{ route('packages') }}" class="px-8 py-4 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-600 transition transform hover:scale-105">Discover Packages</a>
    </div>
</header>

<!-- Welcome Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-extrabold text-indigo-700 mb-4">
            Welcome to <span class="text-yellow-500">YatraSathi</span>
        </h2>
        <p class="text-lg text-gray-600 mb-8">
            Your trusted travel partner for unforgettable journeys. Start exploring the world, one destination at a time.
        </p>
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
<!-- Popular Packages Section -->
<section id="popular-packages" class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-extrabold text-indigo-700 mb-6">Popular Packages</h2>
        <p class="text-lg text-gray-600 mb-8">Explore our top-rated packages tailored for adventurers like you.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($packages as $package)
            <div class="relative bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                <div class="absolute top-4 right-4 bg-yellow-500 px-3 py-1 rounded-lg text-black text-sm font-bold shadow-md">New</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->name }}</h3>
                    <p class="text-lg text-gray-600 mb-4">${{ $package->price }}</p>
                    <a href="{{ route('packages') }}" class="block w-full py-2 text-center bg-indigo-500 text-white font-bold rounded-lg shadow-md hover:bg-indigo-600 transition transform hover:scale-105">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            <a href="{{ route('packages') }}" class="px-8 py-3 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-600 transition transform hover:scale-105">View All Packages</a>
        </div>
    </div>
</section>
@endsection
