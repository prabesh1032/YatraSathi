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
<!-- Airplane Animation -->
 {{-- <div id="airplane" class="absolute top-20 left-0 z-10">
    <img src="{{ asset('plane.png') }}" alt="Flying Airplane" class="w-16 h-16" />
    <style>
        #airplane {
            position: absolute;
            top: 170px;
            left: 0;
            animation: fly 5s linear infinite;
        }

        @keyframes fly {
            0% {
                left: -10%;
            }
            100% {
                left: 110%;
            }
        }
    </style>

    <script>
        window.onload = function() {
            const airplane = document.getElementById('airplane');
            airplane.style.animationPlayState = 'running'; // Starts the flying animation when the page loads
        };
    </script>
</div> --}}

<script>
    const header = document.getElementById('dynamic-header');
    const headerTitle = document.getElementById('header-title');
    const headerDescription = document.getElementById('header-description');

    const images = [
        { url: '{{ asset("home.jpeg") }}', titleColor: 'black', descriptionColor: '#4c51bf' }, // Indigo-700
        { url: '{{ asset("imageii.png") }}', titleColor: 'white', descriptionColor: '#a3e635' } // Lime-200
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
                        <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}" class="w-full h-96 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black to-transparent text-white p-8">
                            <h3 class="text-4xl text-yellow-500 font-extrabold">{{ $package->package_name }}</h3>
                            <p class="text-3xl text-green-600 font-extrabold">${{ $package->package_price }}</p>
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

<!-- Custom Package Builder Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-indigo-700 mb-4">
                <i class="ri-settings-3-line mr-3"></i>Create Your Custom Package
            </h2>
            <p class="text-lg text-gray-600">
                Build your perfect Nepal adventure by selecting your preferences
            </p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 max-w-4xl mx-auto">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 max-w-4xl mx-auto">
                <strong>Please fix the following errors:</strong>
                <ul class="list-disc ml-4 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Custom Package Form -->
        @auth
        <form method="POST" action="{{ route('direct.checkout') }}" id="customPackageForm" class="max-w-6xl mx-auto">
            @csrf
            <input type="hidden" name="is_custom" value="1">
            <input type="hidden" name="guide_id" value="">
            <input type="hidden" name="package_id" id="virtualPackageId" value="0">

            <div class="bg-gray-50 rounded-lg shadow-lg p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Side - Form -->
                    <div class="space-y-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Package Details</h3>

                        <!-- Destination Selection -->
                        <div>
                            <label for="destination_id" class="block text-lg font-bold text-gray-700 mb-2">
                                <i class="ri-map-pin-2-line mr-2"></i>Choose Destination
                            </label>
                            <select id="destination_id" name="destination_id" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required onchange="updateCustomPricing()">
                                <option value="">Select a destination...</option>
                                @php
                                    $destinations = \App\Models\Destination::with('packages')->get();
                                @endphp
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->id }}"
                                            data-base-price="{{ $destination->packages->avg('package_price') ?? 100 }}"
                                            data-name="{{ $destination->name }}">
                                        {{ $destination->name }}
                                        @if($destination->packages->count() > 0)
                                            ({{ $destination->packages->count() }} packages available)
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Duration -->
                        <div>
                            <label for="duration_range" class="block text-lg font-bold text-gray-700 mb-2">
                                <i class="ri-calendar-line mr-2"></i>Duration
                            </label>
                            <select id="duration_range" name="duration_range" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required onchange="updateCustomPricing()">
                                <option value="">Select duration...</option>
                                <option value="3" data-multiplier="1">3 Days (Short Trip)</option>
                                <option value="5" data-multiplier="1.2">5 Days (Standard)</option>
                                <option value="7" data-multiplier="1.4">7 Days (Extended)</option>
                                <option value="10" data-multiplier="1.6">10 Days (Long Adventure)</option>
                                <option value="14" data-multiplier="1.8">14 Days (Full Experience)</option>
                            </select>
                        </div>

                        <!-- Number of People -->
                        <div>
                            <label for="num_people" class="block text-lg font-bold text-gray-700 mb-2">
                                <i class="ri-group-line mr-2"></i>Number of People
                            </label>
                            <input type="number" id="num_people" name="num_people" min="1" max="20" value="2"
                                   class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                                   required onchange="updateCustomPricing()">
                            <small class="text-gray-500">Group discounts apply for 5+ people</small>
                        </div>

                        <!-- Travel Date -->
                        <div>
                            <label for="travel_date" class="block text-lg font-bold text-gray-700 mb-2">
                                <i class="ri-calendar-event-line mr-2"></i>Travel Date
                            </label>
                            <input type="date" id="travel_date" name="travel_date"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                        </div>

                        <!-- Package Type -->
                        <div>
                            <label for="package_type" class="block text-lg font-bold text-gray-700 mb-2">
                                <i class="ri-star-line mr-2"></i>Package Type
                            </label>
                            <select id="package_type" name="package_type" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required onchange="updateCustomPricing()">
                                <option value="budget" data-multiplier="0.8">Budget (Basic accommodation)</option>
                                <option value="standard" data-multiplier="1" selected>Standard (Good accommodation)</option>
                                <option value="luxury" data-multiplier="1.5">Luxury (Premium experience)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Right Side - Price Summary -->
                    <div class="bg-white p-6 rounded-lg shadow h-fit">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Price Summary</h3>

                        <div class="space-y-4" id="customPriceSummary">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Destination:</span>
                                <span id="customSelectedDestination" class="font-medium">Not selected</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Duration:</span>
                                <span id="customSelectedDuration" class="font-medium">Not selected</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">People:</span>
                                <span id="customSelectedPeople" class="font-medium">2</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Package Type:</span>
                                <span id="customSelectedType" class="font-medium">Standard</span>
                            </div>

                            <hr class="my-4">

                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Base Price (per person/day):</span>
                                <span id="customBasePrice" class="font-medium">$0</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Subtotal:</span>
                                <span id="customSubtotal" class="font-medium">$0</span>
                            </div>

                            <div class="flex justify-between items-center text-green-600" id="customDiscountRow" style="display: none;">
                                <span>Group Discount (10%):</span>
                                <span id="customDiscount">-$0</span>
                            </div>

                            <hr class="my-4">

                            <div class="flex justify-between items-center text-2xl font-bold text-blue-600">
                                <span>Total Price:</span>
                                <span id="customTotalPrice">$0</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full mt-6 bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition-colors font-bold disabled:bg-gray-400" disabled id="customCheckoutBtn">
                            <i class="ri-shopping-cart-line mr-2"></i>Book Custom Package
                        </button>
                    </div>
                </div>
            </div>
        </form>
        @else
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8 text-center">
            <div class="mb-6">
                <i class="ri-lock-line text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Login Required</h3>
                <p class="text-gray-600">Please login to create your custom package</p>
            </div>
            <a href="{{ route('login') }}" class="bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition-colors font-bold">
                <i class="ri-login-box-line mr-2"></i>Login Now
            </a>
        </div>
        @endauth
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
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                <div class="absolute top-4 right-4 bg-yellow-500 px-3 py-1 rounded-lg text-black text-sm font-bold shadow-md">New</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->package_name }}</h3>
                    <p class="text-lg text-green-500 font-bold mb-4">${{ $package->package_price }}</p>
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

<script>
// Custom Package Pricing Calculator
function updateCustomPricing() {
    const destinationSelect = document.getElementById('destination_id');
    const durationSelect = document.getElementById('duration_range');
    const numPeople = document.getElementById('num_people').value || 2;
    const packageType = document.getElementById('package_type');

    const selectedDestination = destinationSelect.options[destinationSelect.selectedIndex];
    const selectedDurationOption = durationSelect.options[durationSelect.selectedIndex];
    const selectedTypeOption = packageType.options[packageType.selectedIndex];

    // Update display values
    document.getElementById('customSelectedDestination').textContent = selectedDestination?.dataset.name || 'Not selected';
    document.getElementById('customSelectedDuration').textContent = selectedDurationOption?.text || 'Not selected';
    document.getElementById('customSelectedPeople').textContent = numPeople;
    document.getElementById('customSelectedType').textContent = selectedTypeOption?.text || 'Standard';

    // Calculate pricing
    if (selectedDestination?.dataset.basePrice && selectedDurationOption?.dataset.multiplier) {
        const basePrice = parseFloat(selectedDestination.dataset.basePrice);
        const duration = parseInt(durationSelect.value);
        const durationMultiplier = parseFloat(selectedDurationOption.dataset.multiplier);
        const typeMultiplier = parseFloat(selectedTypeOption.dataset.multiplier);

        const pricePerPersonDay = Math.round(basePrice * typeMultiplier);
        const subtotal = pricePerPersonDay * parseInt(numPeople) * duration;

        // Apply group discount for 5+ people
        let total = subtotal;
        let discountAmount = 0;
        const discountRow = document.getElementById('customDiscountRow');

        if (parseInt(numPeople) >= 5) {
            discountAmount = subtotal * 0.1; // 10% discount
            total = subtotal - discountAmount;
            discountRow.style.display = 'flex';
            document.getElementById('customDiscount').textContent = '-$' + Math.round(discountAmount);
        } else {
            discountRow.style.display = 'none';
        }

        // Update display
        document.getElementById('customBasePrice').textContent = '$' + pricePerPersonDay;
        document.getElementById('customSubtotal').textContent = '$' + subtotal;
        document.getElementById('customTotalPrice').textContent = '$' + Math.round(total);

        // Enable checkout button
        document.getElementById('customCheckoutBtn').disabled = false;

        // Set virtual package ID for the form
        document.getElementById('virtualPackageId').value = 'custom_' + selectedDestination.value + '_' + Date.now();
    } else {
        // Reset pricing
        document.getElementById('customBasePrice').textContent = '$0';
        document.getElementById('customSubtotal').textContent = '$0';
        document.getElementById('customTotalPrice').textContent = '$0';
        document.getElementById('customDiscountRow').style.display = 'none';
        document.getElementById('customCheckoutBtn').disabled = true;
    }
}

// Initialize pricing on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCustomPricing();
});
</script>
@endsection
