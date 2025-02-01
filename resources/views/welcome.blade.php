@extends('layouts.master')

@section('content')
<header class="relative h-screen w-88 bg-cover mt-0 bg-center" id="dynamic-header" style="background-image: url('{{ asset('home.jpeg') }}'); background-attachment:fixed;">
    <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-70"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-start items-center text-center pt-32">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4 animate-bounce" id="header-title" style="color: black;">Explore. Dream. Discover.</h1>
        <p class="text-xl md:text-2xl font-extrabold mb-6" id="header-description" style="color: #4851fe;">Let us take you places you’ve never been.</p>
        <a href="{{ route('location.index') }}" class="px-8 py-4 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
            Start Your Journey
        </a>
    </div>
</header>

<script>
    const header = document.getElementById('dynamic-header');
    const headerTitle = document.getElementById('header-title');
    const headerDescription = document.getElementById('header-description');

    const images = [
        { url: '{{ asset("home.jpeg") }}', titleColor: 'black', descriptionColor: '#4c51bf' }, // Indigo-700
        { url: '{{ asset("home-bg4.jpg") }}', titleColor: 'white', descriptionColor: '#a3e635' } // Lime-200
    ];

    let currentImageIndex = 0;

    setInterval(() => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        const currentImage = images[currentImageIndex];

        // Change the background image
        header.style.backgroundImage = `url('${currentImage.url}')`;

        // Update text colors
        headerTitle.style.color = currentImage.titleColor;
        headerDescription.style.color = currentImage.descriptionColor;
    }, 5000);
</script>

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
            <div class="carousel-wrapper relative">
                <!-- Carousel Items -->
                <div class="carousel flex transition-transform duration-700 ease-in-out">
                    @foreach($packages as $package)
                    <a href="{{ route('packages.read', ['package' => $package->id]) }}" class="w-full flex-shrink-0 relative block">
                        <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-96 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black to-transparent text-white p-8">
                            <h3 class="text-4xl text-yellow-500 font-extrabold">{{ $package->name }}</h3>
                            <p class="text-3xl text-green-600 font-extrabold">${{ $package->price }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                <!-- Navigation Buttons -->
                <button class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow hover:bg-gray-600 focus:outline-none">
                    <i class="ri-arrow-left-s-line text-2xl"></i>
                </button>
                <button class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow hover:bg-gray-600 focus:outline-none">
                    <i class="ri-arrow-right-s-line text-2xl"></i>
                </button>

                <!-- Indicators -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    @foreach($packages as $index => $package)
                    <div class="indicator w-3 h-3 rounded-full bg-gray-400 transition transform hover:scale-110 cursor-pointer" data-index="{{ $index }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Call to Action -->
        <a href="{{ route('packages') }}" class="mt-6 inline-block bg-yellow-500 text-gray-900 font-bold px-6 py-3 rounded-full shadow-md hover:bg-yellow-300 transition duration-300">
            View All Packages
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
                    <p class="text-lg text-green-500 font-bold mb-4">${{ $package->price }}</p>
                    <a href="{{ route('packages.read', ['package' => $package->id]) }}" class="block w-full py-2 text-center bg-indigo-500 text-white font-bold rounded-lg shadow-md hover:bg-indigo-600 transition transform hover:scale-105">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            <a href="{{ route('packages') }}" class="px-8 py-3 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
                See All
            </a>
        </div>
    </div>
</section>

<!-- Carousel Script -->
<script>
    const carousel = document.querySelector('.carousel');
    const slides = document.querySelectorAll('.carousel > a');
    const totalSlides = slides.length;
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const indicators = document.querySelectorAll('.indicator');

    let currentIndex = 0;

    function updateCarousel(index) {
        const offset = -index * 100;
        carousel.style.transform = `translateX(${offset}%)`;
        indicators.forEach((indicator, i) => {
            indicator.style.backgroundColor = i === index ? 'yellow' : 'gray';
        });
    }

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel(currentIndex);
    });

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel(currentIndex);
    });

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel(currentIndex);
        });
    });

    // Auto-slide functionality
    setInterval(() => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel(currentIndex);
    }, 3000); // Auto-slide every 5 seconds

    // Initialize the first indicator
    updateCarousel(currentIndex);
</script>
@endsection
