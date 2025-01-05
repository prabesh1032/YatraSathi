@extends('layouts.master')

@section('content')
<!-- Header Section -->
<header class="relative h-screen w-88 bg-cover mt-0 bg-center" style="background-image: url('{{ asset('home.jpeg') }}'); background-attachment:fixed;">
    <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-70"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-indigo-700">
        <h1 class="text-5xl md:text-6xl text-black font-extrabold mb-4 animate-bounce">Explore. Dream. Discover.</h1>
        <p class="text-xl md:text-2xl font-extrabold mb-6">Let us take you places you’ve never been.</p>
        <a href="{{ route('packages') }}" class="px-8 py-4 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
            Discover Packages
        </a>
    </div>
</header>
<!-- Welcome Section -->
<section class="py-8 bg-gray-100">
    <div class="container mx-auto text-center">
        <!-- Heading Section -->
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-indigo-400 mb-4">
            Welcome to <span class="text-yellow-500 ">YatraSathi<i class="ri-earth-line text-cyan-500 ml-2 transition-colors duration-300 hover:text-indigo-500 "></i></span>
        </h2>
        <p class="text-lg text-gray-900 mb-8 font-roboto-slab tracking-wide">
            Your trusted travel partner for unforgettable journeys. Start exploring the world, one destination at a time.
        </p>

        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-indigo-400 mb-4">
            Experience Unforgettable <span class="text-yellow-500">Adventures</span>
        </h2>
        <p class="text-lg mb-8 text-gray-900 font-roboto-slab tracking-wide">
            Discover breathtaking destinations through different packages and create lifelong memories.
        </p>
        <div class="flex justify-center items-center space-x-6 text-4xl mb-8">
            <i class="ri-plane-line text-indigo-500 hover:text-indigo-700 transition transform hover:scale-125"></i>
            <i class="ri-map-pin-line text-lime-500 hover:text-lime-700 transition transform hover:scale-125"></i>
            <i class="ri-earth-line text-yellow-500 hover:text-yellow-700 transition transform hover:scale-125"></i>
            <i class="ri-suitcase-line text-teal-500 hover:text-teal-700 transition transform hover:scale-125"></i>
            <i class="ri-bus-line text-blue-500 hover:text-blue-700 transition transform hover:scale-125"></i>
            <i class="ri-hotel-line text-purple-500 hover:text-purple-700 transition transform hover:scale-125"></i>
            <i class="ri-camera-line text-red-500 hover:text-red-700 transition transform hover:scale-125"></i>
            <i class="ri-compass-line text-green-500 hover:text-green-700 transition transform hover:scale-125"></i>
        </div>
        <!-- Carousel / Slider -->
        <div class="relative w-full lg:w-8/12 mx-auto overflow-hidden rounded-lg shadow-lg">
            <div class="carousel flex transition-transform duration-500 ease-in-out">
                @foreach($packages as $package)
                <a href="{{ route('packages.read', ['package' => $package->id]) }}" class="w-full flex-shrink-0 relative block">
                    <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-80 object-cover rounded-lg shadow-lg hover:scale-105 transition-all duration-300">
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black  to-transparent text-white p-4">
                        <h3 class="text-3xl text-yellow-500 font-bold">{{ $package->name }}</h3>
                        <p class="text-xl text-green-600 font-bold">${{ $package->price }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <!-- Call to Action -->
        <a href="{{ route('packages') }}" class="mt-6 inline-block bg-yellow-500 text-gray-900 font-bold px-6 py-3 rounded-full shadow-md hover:bg-yellow-300 transition duration-300">
            Start Your Journey
        </a>
    </div>
</section>

<!-- Popular Packages Section -->
<section id="popular-packages" class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-extrabold text-indigo-700 mb-6">Popular Packages</h2>
        <p class="text-lg text-gray-600 mb-8">Explore our top-rated packages tailored for adventurers like you.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($packages->take(3) as $package)
            <div class="relative bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                <div class="absolute top-4 right-4 bg-yellow-500 px-3 py-1 rounded-lg text-black text-sm font-bold shadow-md">New</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->name }}</h3>
                    <p class="text-lg text-gray-600 mb-4">${{ $package->price }}</p>
                    <a href="{{ route('packages.read', ['package' => $package->id]) }}" class="block w-full py-2 text-center bg-indigo-500 text-white font-bold rounded-lg shadow-md hover:bg-indigo-600 transition transform hover:scale-105">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            <a href="{{ route('packages') }}" class="px-8 py-3 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
                View All Packages
            </a>
        </div>
    </div>
</section>

<!-- Carousel Script -->
<script>
    const carousel = document.querySelector('.carousel');
    let currentIndex = 0;
    const totalSlides = document.querySelectorAll('.carousel > a').length;

    setInterval(() => {
        currentIndex = (currentIndex + 1) % totalSlides;
        const offset = -currentIndex * 100;
        carousel.style.transform = `translateX(${offset}%)`;
    }, 3000); // Auto-slide every 3 seconds
</script>
@endsection
