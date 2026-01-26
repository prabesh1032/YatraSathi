@extends('layouts.master')

@section('content')
    <header class="relative h-screen w-88 bg-cover mt-0 bg-center" id="dynamic-header"
        style="background-image: url('{{ asset('home.jpeg') }}'); background-attachment:fixed;">
        <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-70"></div>
        <div class="relative container mx-auto h-full flex flex-col justify-start items-center text-center pt-32">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 animate-bounce" id="header-title" style="color: black;">
                Explore. Dream. Discover.</h1>
            <p class="text-xl md:text-2xl font-extrabold mb-6" id="header-description" style="color: #4851fe;">Let us take you
                places you’ve never been.</p>
            <a href="{{ route('location.index') }}"
                class="px-8 py-4 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
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

        const images = [{
                url: '{{ asset('home.jpeg') }}',
                titleColor: 'black',
                descriptionColor: '#4c51bf'
            }, // Indigo-700
            {
                url: '{{ asset('imageii.png') }}',
                titleColor: 'white',
                descriptionColor: '#a3e635'
            } // Lime-200
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

    <!-- Custom CSS for 3D Effects and Animations -->
    <style>
        .perspective-1000 {
            perspective: 1000px;
        }

        .rotate-y-12:hover {
            transform: rotateY(12deg) scale(1.05);
        }

        .filter {
            transition: filter 0.7s ease;
        }

        .group:hover .filter {
            filter: brightness(110%) contrast(110%) saturate(120%);
        }

        /* Advanced hover animations */
        .group:hover .bg-gradient-to-br {
            animation: gradientShift 2s ease-in-out infinite;
        }

        @keyframes gradientShift {

            0%,
            100% {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            50% {
                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            }
        }

        /* Floating animation for cards */
        .group:hover {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        /* Pulse effect for explore button */
        .group\\/btn:hover {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(99, 102, 241, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0);
            }
        }

        /* Shimmer effect */
        .group:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 1.5s infinite;
            z-index: 20;
            pointer-events: none;
            border-radius: 1rem;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        /* Glow effect */
        .group:hover .bg-gradient-to-br {
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
        }

        /* Smooth transitions */
        * {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Fade-in animations */
        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        .fade-in-right {
            animation: fadeInRight 1s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Floating animation for award badge */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>

    <!-- Welcome Section -->
    <section class="py-8 bg-gray-100">
        {{-- <div class="container mx-auto text-center">
            <h2
                class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-indigo-400 mb-4">
                Welcome to <span class="text-yellow-500 ">YatraSathi<i
                        class="ri-earth-line text-cyan-500 ml-2 transition-colors duration-300 hover:text-indigo-500 "></i></span>
            </h2>
            <p class="text-lg text-gray-900 mb-8 font-roboto-slab tracking-wide">
                Your trusted travel partner for unforgettable journeys. Start exploring the world, one destination at a
                time.
            </p>

            <!-- Carousel / Slider -->
            <div class="relative w-full lg:w-8/12 mx-auto overflow-hidden rounded-lg shadow-lg">
                <div class="carousel-wrapper relative">
                    <!-- Carousel Items -->
                    <div class="carousel flex transition-transform duration-700 ease-in-out">
                        @foreach ($packages as $package)
                            <a href="{{ route('packages.read', ['package' => $package->id]) }}"
                                class="w-full flex-shrink-0 relative block">
                                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}"
                                    class="w-full h-96 object-cover rounded-lg">
                                <div
                                    class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black to-transparent text-white p-8">
                                    <h3 class="text-4xl text-yellow-500 font-extrabold">{{ $package->package_name }}</h3>
                                    <p class="text-3xl text-green-600 font-extrabold">${{ $package->package_price }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <!-- Navigation Buttons -->
                    <button
                        class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow hover:bg-gray-600 focus:outline-none">
                        <i class="ri-arrow-left-s-line text-2xl"></i>
                    </button>
                    <button
                        class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow hover:bg-gray-600 focus:outline-none">
                        <i class="ri-arrow-right-s-line text-2xl"></i>
                    </button>

                    <!-- Indicators -->
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                        @foreach ($packages as $index => $package)
                            <div class="indicator w-3 h-3 rounded-full bg-gray-400 transition transform hover:scale-110 cursor-pointer"
                                data-index="{{ $index }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Call to Action -->
            <a href="{{ route('packages') }}"
                class="mt-6 inline-block bg-yellow-500 text-gray-900 font-bold px-6 py-3 rounded-full shadow-md hover:bg-yellow-300 transition duration-300">
                View All Packages
            </a>

        </div> --}}

        <!-- Beautiful About Section -->
        <section id="about" class="py-20 bg-gradient-to-br from-blue-50 to-orange-50">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div class="fade-in-up">
                        <div
                            class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-6">
                            <i class="ri-plane-line mr-2"></i>
                            Welcome to YatraSathi
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-800 mb-6 leading-tight">
                            Explore Nepal <br>
                            <span class="text-orange-500">With Confidence</span>
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Discover amazing destinations across Nepal, create unforgettable memories, and experience the
                            journey of a
                            lifetime with our expertly curated travel packages and local expertise.
                        </p>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="bg-orange-100 rounded-full p-3">
                                        <i class="ri-user-heart-line text-2xl text-orange-500"></i>
                                    </div>
                                    <div>
                                        <div class="text-2xl font-bold text-gray-800">1,000+</div>
                                        <div class="text-sm text-gray-600">Happy Travelers</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="bg-blue-100 rounded-full p-3">
                                        <i class="ri-map-pin-line text-2xl text-blue-500"></i>
                                    </div>
                                    <div>
                                        <div class="text-2xl font-bold text-gray-800">50+</div>
                                        <div class="text-sm text-gray-600">Destinations</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('packages') }}"
                                class="inline-flex items-center justify-center bg-gradient-to-r from-blue-700 to-blue-900 hover:from-blue-800 hover:to-blue-950 text-white px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:scale-105 shadow-lg">
                                Explore Destinations
                                <i class="ri-arrow-right-line ml-2"></i>
                            </a>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center justify-center bg-white border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white px-8 py-4 rounded-full font-bold text-lg transition-all duration-300">
                                <i class="ri-customer-service-line mr-2"></i>
                                Contact Us
                            </a>
                        </div>
                    </div>

                    <!-- Right Content - Image -->
                    <div class="fade-in-right">
                        <div class="relative">
                            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-4 shadow-2xl">
                                <img src="{{ asset('home.jpeg') }}" alt="Nepal Travel Experience"
                                    class="rounded-2xl w-full h-96 object-cover">
                            </div>
                            <!-- Floating Element -->
                            <div
                                class="absolute -bottom-6 -right-6 bg-gradient-to-r from-blue-700 to-blue-900 text-white rounded-xl shadow-xl p-6 floating">
                                <div class="flex items-center gap-4">
                                    <div class="bg-white/20 rounded-full p-3">
                                        <i class="ri-award-line text-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-xl font-bold">Trusted Partner</div>
                                        <div class="text-sm">Nepal Tourism 2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @auth
            @if ($recommendedPackages->isNotEmpty())
                <section class="py-16 bg-gradient-to-r from-indigo-50 to-purple-50">
                    <div class="container mx-auto">
                        <div class="fade-in-up text-center max-w-2xl mx-auto mb-12">
                            <!-- Top Badge -->
                            <div
                                class="inline-block bg-orange-100 text-orange-600 px-4 py-1.5 rounded-full text-sm font-semibold mb-4">
                                <i class="ri-magic-line mr-1"></i>
                                Personalized Picks
                            </div>

                            <!-- Heading -->
                            <h2 class="text-2xl lg:text-3xl font-extrabold text-gray-800 mb-3">
                                Recommended
                                <span class="text-orange-500">For</span>
                                <span class="text-blue-700">You</span>
                            </h2>

                            <!-- Description -->
                            <p class="text-sm lg:text-base text-gray-600">
                                Based on your preferences and travel history, here are our AI-powered recommendations crafted
                                just for you.
                            </p>
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-6">
                            @foreach ($recommendedPackages as $package)
                                <div
                                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group">
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('images/' . $package->photopath) }}"
                                            alt="{{ $package->package_name }}"
                                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300">
                                        </div>
                                        <div class="absolute top-4 left-4">
                                            <span
                                                class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                                <i class="ri-star-fill mr-1"></i>AI Pick
                                            </span>
                                        </div>
                                        <div class="absolute top-4 right-4">
                                            <span class="bg-yellow-400 text-black px-3 py-2 rounded-full text-sm font-bold">
                                                ${{ $package->package_price }}
                                            </span>
                                        </div>
                                        <div
                                            class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="text-white text-sm">
                                                @foreach ($package->recommendation_reasons as $reason)
                                                    <div class="flex items-center mb-1">
                                                        <i class="ri-check-line mr-2 text-green-400"></i>
                                                        {{ $reason }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-6">
                                        <h3
                                            class="text-xl font-bold text-gray-800 mb-2 group-hover:text-indigo-600 transition-colors">
                                            {{ $package->package_name }}
                                        </h3>
                                        <div class="flex items-center text-gray-600 mb-3">
                                            <i class="ri-map-pin-line mr-2 text-indigo-500"></i>
                                            <span
                                                class="text-sm">{{ $package->destination->name ?? 'Various Locations' }}</span>
                                            <span class="mx-2">•</span>
                                            <i class="ri-time-line mr-2 text-indigo-500"></i>
                                            <span class="text-sm">{{ $package->duration }} days</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                            {{ Str::limit($package->package_description, 100) }}
                                        </p>

                                        <!-- Recommendation Score Display -->
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center">
                                                <span class="text-xs text-gray-500 mr-2">Match Score:</span>
                                                @php
                                                    $scorePercentage = min(
                                                        100,
                                                        ($package->recommendation_score / 100) * 100,
                                                    );
                                                @endphp
                                                <div class="flex-1 bg-gray-200 rounded-full h-2 w-20">
                                                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2 rounded-full"
                                                        style="width: {{ $scorePercentage }}%"></div>
                                                </div>
                                                <span
                                                    class="text-xs text-indigo-600 ml-2 font-semibold">{{ round($scorePercentage) }}%</span>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('packages.read', $package->id) }}"
                                                class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 flex items-center">
                                                <i class="ri-eye-line mr-2"></i>
                                                View Details
                                            </a>
                                            <div class="text-right">
                                                <div class="text-2xl font-bold text-indigo-600">${{ $package->package_price }}
                                                </div>
                                                <div class="text-xs text-gray-500">per person</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-8">
                            <a href="{{ route('preferences.edit') }}"
                                class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-semibold">
                                <i class="ri-settings-3-line mr-2"></i>
                                Update Your Preferences
                            </a>
                        </div>
                    </div>
                </section>
            @endif

            <!-- First-time User Preferences Modal -->
            @if (session('show_preferences_modal'))
                <div id="preferencesModal"
                    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
                        <div class="p-8 text-center">
                            <div class="mb-6">
                                <i class="ri-magic-line text-6xl text-indigo-600 mb-4"></i>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Welcome to YatraSathi!</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Help us personalize your travel experience by telling us about your preferences.
                                    Our AI will recommend perfect packages just for you!
                                </p>
                            </div>
                            <div class="space-y-3">
                                <a href="{{ route('preferences.show') }}"
                                    class="block w-full bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                                    <i class="ri-heart-line mr-2"></i>Set My Preferences
                                </a>
                                <button onclick="closePreferencesModal()"
                                    class="block w-full bg-gray-200 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                                    Maybe Later
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function closePreferencesModal() {
                        document.getElementById('preferencesModal').style.display = 'none';
                    }
                </script>
            @endif
        @endauth
    </section>

    <!-- Custom Package Builder Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <!-- Top Badge (Hero Style) -->
                <div class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    <i class="ri-settings-3-line mr-2"></i>
                    Customize Your Trip
                </div>

                <!-- Heading -->
                <h2 class="text-2xl lg:text-3xl font-extrabold mb-3">
                    <span class="text-orange-500">Create Your</span>
                    <span class="text-blue-700">Custom Package</span>
                </h2>

                <!-- Description -->
                <p class="text-sm lg:text-base text-black max-w-xl mx-auto">
                    Build your perfect Nepal adventure by selecting your travel preferences.
                </p>
            </div>


            @if (session('error'))
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

            <!-- Enhanced Custom Package Form - Available for All Users -->
            <form method="POST" action="{{ auth()->check() ? route('direct.checkout') : route('login') }}"
                id="customPackageForm" class="max-w-6xl mx-auto">
                @csrf
                <input type="hidden" name="is_custom" value="1">
                <input type="hidden" name="guide_id" value="">
                <input type="hidden" name="package_id" id="virtualPackageId" value="0">

                <!-- Store form data for login redirect -->
                @guest
                    <input type="hidden" name="redirect_after_login" value="{{ url()->current() }}">
                @endguest

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
                                <select id="destination_id" name="destination_id"
                                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                                    required onchange="updateCustomPricing()">
                                    <option value="">Select a destination...</option>
                                    @php
                                        $destinations = \App\Models\Destination::with('packages')->get();
                                    @endphp
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}"
                                            data-base-price="{{ $destination->packages->avg('package_price') ?? 100 }}"
                                            data-name="{{ $destination->name }}">
                                            {{ $destination->name }}
                                            @if ($destination->packages->count() > 0)
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
                                <select id="duration_range" name="duration_range"
                                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                                    required onchange="updateCustomPricing()">
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
                                <input type="number" id="num_people" name="num_people" min="1" max="20"
                                    value="2"
                                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                                    required onchange="updateCustomPricing()" oninput="updateCustomPricing()">
                                <small class="text-gray-500">Group discounts apply for 5+ people</small>
                            </div>

                            <!-- Travel Date -->
                            <div>
                                <label for="travel_date" class="block text-lg font-bold text-gray-700 mb-2">
                                    <i class="ri-calendar-event-line mr-2"></i>Travel Date
                                </label>
                                <input type="date" id="travel_date" name="travel_date"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                                    required>
                            </div>

                            <!-- Package Type -->
                            <div>
                                <label for="package_type" class="block text-lg font-bold text-gray-700 mb-2">
                                    <i class="ri-star-line mr-2"></i>Package Type
                                </label>
                                <select id="package_type" name="package_type"
                                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                                    required onchange="updateCustomPricing()">
                                    <option value="budget" data-multiplier="0.8">Budget (Basic accommodation)</option>
                                    <option value="standard" data-multiplier="1" selected>Standard (Good accommodation)
                                    </option>
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

                                <div class="flex justify-between items-center text-green-600" id="customDiscountRow"
                                    style="display: none;">
                                    <span>Group Discount (10%):</span>
                                    <span id="customDiscount">-$0</span>
                                </div>

                                <hr class="my-4">

                                <div class="flex justify-between items-center text-2xl font-bold text-blue-600">
                                    <span>Total Price:</span>
                                    <span id="customTotalPrice">$0</span>
                                </div>
                            </div>

                            @auth
                                <button type="submit"
                                    class="w-full mt-6 bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition-colors font-bold disabled:bg-gray-400"
                                    disabled id="customCheckoutBtn">
                                    <i class="ri-shopping-cart-line mr-2"></i>Book Custom Package
                                </button>
                            @else
                                <button type="button" onclick="redirectToLogin()"
                                    class="w-full mt-6 bg-gradient-to-r from-green-500 to-green-600 text-white py-4 px-6 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 font-bold text-lg shadow-lg transform hover:scale-105 disabled:opacity-50 disabled:transform-none"
                                    disabled id="loginToBookBtn">
                                    <i class="ri-login-box-line mr-2"></i>Book Package
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- AI Recommendations Section -->


    <!-- Popular Destinations Section -->
    <section id="destinations" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12 fade-in-up">
                <!-- Top Badge -->
                <div class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    <i class="ri-map-pin-line mr-2"></i>
                    Explore Nepal
                </div>

                <!-- Heading -->
                <h2 class="text-2xl lg:text-3xl font-extrabold mb-3">
                    <span class="text-orange-500">Popular</span>
                    <span class="text-blue-700">Destinations</span>
                </h2>

                <!-- Description -->
                <p class="text-sm lg:text-base text-black max-w-2xl mx-auto">
                    Discover our most sought-after travel destinations for unforgettable experiences.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $featuredDestinations = \App\Models\Destination::withCount('packages')
                        ->whereHas('packages')
                        ->orderBy('packages_count', 'desc')
                        ->take(6)
                        ->get();
                @endphp

                @foreach ($featuredDestinations as $destination)
                    <!-- Destination {{ $loop->iteration }} -->
                    <a href="{{ route('packages') }}?destination={{ $destination->id }}"
                        class="package-card group relative block bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            @if ($destination->photopath)
                                <img src="{{ asset('images/' . $destination->photopath) }}"
                                    alt="{{ $destination->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center">
                                    <i class="ri-landscape-line text-white text-6xl"></i>
                                </div>
                            @endif
                            <!-- Light Blue Overlay on Hover with Description -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-blue-500/80 via-blue-400/60 to-blue-300/40 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center p-6">
                                <p class="text-white text-sm text-center leading-relaxed line-clamp-3 font-medium">
                                    @if ($destination->description)
                                        {{ Str::limit($destination->description, 120) }}
                                    @else
                                        Discover the beauty and culture of {{ $destination->name }}. Experience
                                        breathtaking landscapes, rich heritage, and unforgettable adventures in this amazing
                                        destination.
                                    @endif
                                </p>
                            </div>
                            <!-- Package Count Badge -->
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                    {{ $destination->packages_count }}
                                    {{ $destination->packages_count == 1 ? 'Package' : 'Packages' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3
                                class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors text-center">
                                {{ $destination->name }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('packages') }}"
                    class="inline-flex items-center bg-gradient-to-r from-blue-700 to-blue-900 hover:from-blue-800 hover:to-blue-950 text-white px-8 py-2.5 rounded-full font-bold text-sm transition-all duration-300 hover:scale-105 shadow-lg">
                    View All Destinations
                    <i class="ri-map-pin-line ml-3"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Popular Packages Section -->
    <section id="popular-packages" class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <div class="text-center mb-12">
                <!-- Top Badge -->
                <div class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    <i class="ri-fire-line mr-2"></i>
                    Top Picks
                </div>

                <!-- Heading -->
                <h2 class="text-2xl lg:text-3xl font-extrabold mb-3">
                    <span class="text-orange-500">Popular</span>
                    <span class="text-blue-700">Packages</span>
                </h2>

                <!-- Description -->
                <p class="text-sm lg:text-base text-black max-w-xl mx-auto">
                    Explore our top-rated packages tailored for adventurers like you.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($packages->take(3) as $package)
                    <div
                        class="relative bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}"
                            class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                        <div
                            class="absolute top-4 right-4 bg-yellow-500 px-3 py-1 rounded-lg text-black text-sm font-bold shadow-md">
                            New</div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->package_name }}</h3>
                            <p class="text-lg text-green-500 font-bold mb-4">${{ $package->package_price }}</p>
                            <a href="{{ route('packages.read', ['package' => $package->id]) }}"
                                class="block w-full py-2 text-center bg-indigo-500 text-white font-bold rounded-lg shadow-md hover:bg-indigo-600 transition transform hover:scale-105">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                <a href="{{ route('packages') }}"
                    class="px-8 py-3 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
                    See All
                </a>
            </div>
        </div>
    </section>
    <script>
        // Custom Package Pricing Calculator with Form Data Persistence
        function updateCustomPricing() {
            console.log('updateCustomPricing called'); // Debug log

            const destinationSelect = document.getElementById('destination_id');
            const durationSelect = document.getElementById('duration_range');
            const numPeople = document.getElementById('num_people').value || 2;
            const packageType = document.getElementById('package_type');

            if (!destinationSelect || !durationSelect || !packageType) {
                console.error('Form elements not found');
                return;
            }

            const selectedDestination = destinationSelect.options[destinationSelect.selectedIndex];
            const selectedDurationOption = durationSelect.options[durationSelect.selectedIndex];
            const selectedTypeOption = packageType.options[packageType.selectedIndex];

            console.log('Selected values:', {
                destination: selectedDestination?.value,
                duration: durationSelect.value,
                people: numPeople,
                type: packageType.value
            });

            // Update display values
            document.getElementById('customSelectedDestination').textContent = selectedDestination?.dataset.name ||
                'Not selected';
            document.getElementById('customSelectedDuration').textContent = selectedDurationOption?.text || 'Not selected';
            document.getElementById('customSelectedPeople').textContent = numPeople;
            document.getElementById('customSelectedType').textContent = selectedTypeOption?.text || 'Standard';

            // Calculate pricing
            if (selectedDestination?.dataset.basePrice && selectedDurationOption?.dataset.multiplier && durationSelect
                .value) {
                const basePrice = parseFloat(selectedDestination.dataset.basePrice);
                const duration = parseInt(durationSelect.value);
                const durationMultiplier = parseFloat(selectedDurationOption.dataset.multiplier);
                const typeMultiplier = parseFloat(selectedTypeOption.dataset.multiplier || 1);

                console.log('Calculation values:', {
                    basePrice,
                    duration,
                    durationMultiplier,
                    typeMultiplier
                });

                const pricePerPersonDay = Math.round(basePrice * typeMultiplier);
                const subtotal = pricePerPersonDay * parseInt(numPeople) * duration;

                // Apply group discount for 5+ people
                let total = subtotal;
                let discountAmount = 0;
                const discountRow = document.getElementById('customDiscountRow');

                if (parseInt(numPeople) >= 5) {
                    discountAmount = subtotal * 0.1; // 10% discount
                    total = subtotal - discountAmount;
                    if (discountRow) {
                        discountRow.style.display = 'flex';
                        document.getElementById('customDiscount').textContent = '-$' + Math.round(discountAmount);
                    }
                } else {
                    if (discountRow) {
                        discountRow.style.display = 'none';
                    }
                }

                // Update display
                const basePriceElement = document.getElementById('customBasePrice');
                const subtotalElement = document.getElementById('customSubtotal');
                const totalPriceElement = document.getElementById('customTotalPrice');

                if (basePriceElement) basePriceElement.textContent = '$' + pricePerPersonDay;
                if (subtotalElement) subtotalElement.textContent = '$' + subtotal;
                if (totalPriceElement) totalPriceElement.textContent = '$' + Math.round(total);

                console.log('Updated prices:', {
                    pricePerPersonDay,
                    subtotal,
                    total
                });

                // Enable appropriate checkout button
                const checkoutBtn = document.getElementById('customCheckoutBtn');
                const loginBtn = document.getElementById('loginToBookBtn');

                if (checkoutBtn) {
                    checkoutBtn.disabled = false;
                }
                if (loginBtn) {
                    loginBtn.disabled = false;
                }

                // Set virtual package ID for the form
                const virtualPackageIdElement = document.getElementById('virtualPackageId');
                if (virtualPackageIdElement) {
                    virtualPackageIdElement.value = 'custom_' + selectedDestination.value + '_' + Date.now();
                }
            } else {
                console.log('Missing required values for calculation');

                // Reset pricing
                const basePriceElement = document.getElementById('customBasePrice');
                const subtotalElement = document.getElementById('customSubtotal');
                const totalPriceElement = document.getElementById('customTotalPrice');
                const discountRow = document.getElementById('customDiscountRow');

                if (basePriceElement) basePriceElement.textContent = '$0';
                if (subtotalElement) subtotalElement.textContent = '$0';
                if (totalPriceElement) totalPriceElement.textContent = '$0';
                if (discountRow) discountRow.style.display = 'none';

                // Disable appropriate checkout button
                const checkoutBtn = document.getElementById('customCheckoutBtn');
                const loginBtn = document.getElementById('loginToBookBtn');

                if (checkoutBtn) {
                    checkoutBtn.disabled = true;
                }
                if (loginBtn) {
                    loginBtn.disabled = true;
                }
            }
        }

        // Handle login redirect
        function redirectToLogin() {
            window.location.href = '{{ route('login') }}';
        }

        // Initialize pricing on page load
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing custom package form...');

            // Initialize pricing calculation
            updateCustomPricing();

            // Add additional event listeners to ensure all interactions update pricing
            const formElements = [
                document.getElementById('destination_id'),
                document.getElementById('duration_range'),
                document.getElementById('num_people'),
                document.getElementById('package_type')
            ];

            formElements.forEach(element => {
                if (element) {
                    element.addEventListener('change', updateCustomPricing);
                    element.addEventListener('input', updateCustomPricing);
                }
            });
        });
    </script>
@endsection
