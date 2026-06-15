@extends('layouts.master')

@section('content')
    <header class="relative w-full overflow-hidden" id="dynamic-header" style="height: 100vh;">
        {{-- Background images with crossfade --}}
        <div class="absolute inset-0 transition-opacity duration-1000" id="bg-1"
            style="background-image: url('{{ asset('home.jpeg') }}'); background-size: cover; background-position: center; opacity: 1;">
        </div>
        <div class="absolute inset-0 transition-opacity duration-1000" id="bg-2"
            style="background-image: url('{{ asset('imageii.png') }}'); background-size: cover; background-position: center; opacity: 0;">
        </div>

        {{-- Strong overlay for text readability --}}
        <div class="absolute inset-0"
            style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);">
        </div>

        {{-- Content — left aligned, vertically centered --}}
        <div class="relative h-full flex flex-col justify-center px-6 lg:px-24 max-w-3xl">
            {{-- Heading --}}
            <h1 class="text-white font-extrabold leading-none mb-5"
                style="font-family: 'Syne', sans-serif; font-size: clamp(2.8rem, 3vw, 5rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
                Explore.<br>
                Dream.<br>
                <em class="not-italic text-orange-400">Discover.</em>
            </h1>

            {{-- Subheading --}}
            <p class="text-blue-100/80 text-sm md:text-base max-w-sm mb-10 leading-relaxed"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                Expertly curated Nepal travel experiences — from Himalayan treks to cultural escapes.
            </p>

            {{-- CTAs --}}
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('destinations.public') }}"
                    class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-400 text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300 hover:scale-105 shadow-lg"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Start Your Journey
                    <i class="ri-arrow-right-line"></i>
                </a>
                <a href="{{ route('packages') }}"
                    class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 border border-white/30 hover:border-white/60 text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300 backdrop-blur-sm"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-map-pin-line"></i>
                    View Packages
                </a>
            </div>

            {{-- Stats strip --}}
            <div class="flex items-center gap-8 mt-12 pt-8 border-t border-white/10">
                <div>
                    <div class="text-white font-extrabold text-xl" style="font-family: 'Syne', sans-serif;">1,000+</div>
                    <div class="text-white/50 text-xs" style="font-family: 'Plus Jakarta Sans', sans-serif;">Happy Travelers
                    </div>
                </div>
                <div class="w-px h-8 bg-white/20"></div>
                <div>
                    <div class="text-white font-extrabold text-xl" style="font-family: 'Syne', sans-serif;">50+</div>
                    <div class="text-white/50 text-xs" style="font-family: 'Plus Jakarta Sans', sans-serif;">Destinations
                    </div>
                </div>
                <div class="w-px h-8 bg-white/20"></div>
                <div>
                    <div class="text-white font-extrabold text-xl" style="font-family: 'Syne', sans-serif;">100%</div>
                    <div class="text-white/50 text-xs" style="font-family: 'Plus Jakarta Sans', sans-serif;">Local Expertise
                    </div>
                </div>
            </div>

        </div>

    </header>

    <script>
        const backgrounds = [
            document.getElementById('bg-1'),
            document.getElementById('bg-2'),
        ];
        let current = 0;
        setInterval(() => {
            backgrounds[current].style.opacity = '0';
            current = (current + 1) % backgrounds.length;
            backgrounds[current].style.opacity = '1';
        }, 5000);
    </script>
    <!-- Welcome Section -->
    <section class="py-8 bg-gray-100">
        <section id="about" class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    {{-- Left Content --}}
                    <div class="fade-in-up">

                        {{-- Heading --}}
                        <div
                            class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-6">
                            <i class="ri-plane-line mr-2"></i>
                            Welcome to YatraSathi
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-800 mb-6 leading-tight"
                         style="font-family: 'DM Serif Display', Georgia, serif;">
                            Explore Nepal <br>
                            <span class="text-orange-500">With Confidence</span>
                        </h2>
                        <p class="text-lg text-gray-600 mb-8" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            Discover amazing destinations across Nepal, create unforgettable memories, and experience the
                            journey of a lifetime with our expertly curated travel packages and local expertise.
                        </p>

                        {{-- Stats --}}
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div
                                class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-center gap-3">
                                    <div class="bg-orange-50 rounded-xl p-2.5">
                                        <i class="ri-user-heart-line text-xl text-orange-500"></i>
                                    </div>
                                    <div>
                                        <div class="text-xl font-extrabold text-blue-900"
                                            style="font-family: 'Syne', sans-serif;">1,000+</div>
                                        <div class="text-xs text-gray-400">Happy Travelers</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-center gap-3">
                                    <div class="bg-blue-50 rounded-xl p-2.5">
                                        <i class="ri-map-pin-line text-xl text-blue-700"></i>
                                    </div>
                                    <div>
                                        <div class="text-xl font-extrabold text-blue-900"
                                            style="font-family: 'Syne', sans-serif;">50+</div>
                                        <div class="text-xs text-gray-400">Destinations</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CTAs --}}
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('packages') }}"
                                class="inline-flex items-center justify-center bg-blue-900 hover:bg-blue-800 text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300 hover:scale-105 shadow-md"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Explore Destinations
                                <i class="ri-arrow-right-line ml-2"></i>
                            </a>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center justify-center border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-customer-service-line mr-2"></i>
                                Contact Us
                            </a>
                        </div>
                    </div>

                    {{-- Right Content --}}
                    <div class="fade-in-right">
                        <div class="relative">

                            {{-- Image --}}
                            <div class="rounded-3xl overflow-hidden shadow-xl">
                                <img src="{{ asset('home.jpeg') }}" alt="Nepal Travel Experience"
                                    class="w-full h-96 object-cover">
                            </div>

                            {{-- Floating badge --}}
                            <div
                                class="absolute -bottom-5 -right-5 bg-blue-900 text-white rounded-2xl shadow-xl p-4 floating">
                                <div class="flex items-center gap-3">
                                    <div class="bg-white/20 rounded-full p-2">
                                        <i class="ri-award-line text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold" style="font-family: 'Syne', sans-serif;">Trusted
                                            Partner</div>
                                        <div class="text-xs text-blue-200">Nepal Tourism 2024</div>
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

                <h2 class="text-blue-900 leading-tight mb-3"
                    style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.7rem, 3vw, 2.4rem);">
                    Create Your <em class="not-italic text-orange-500">Custom Package</em>
                </h2>
                <p class="text-sm text-gray-500 max-w-xl mx-auto leading-relaxed"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
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

            <form method="POST" action="{{ auth()->check() ? route('direct.checkout') : route('login') }}"
                id="customPackageForm" class="max-w-6xl mx-auto">
                @csrf
                <input type="hidden" name="is_custom" value="1">
                <input type="hidden" name="guide_id" value="">
                <input type="hidden" name="package_id" id="virtualPackageId" value="0">
                @guest
                    <input type="hidden" name="redirect_after_login" value="{{ url()->current() }}">
                @endguest

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- Left Side - Form Fields --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-5">
                        <h3 class="text-blue-900 font-semibold mb-1"
                            style="font-family: 'DM Serif Display', Georgia, serif; font-size: 1.4rem;">
                            Package Details
                        </h3>

                        {{-- Destination --}}
                        <div>
                            <label for="destination_id"
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                                <i class="ri-map-pin-2-line mr-1 text-orange-500"></i> Destination
                            </label>
                            <select id="destination_id" name="destination_id"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                                required onchange="updateCustomPricing()">
                                <option value="">Select a destination...</option>
                                @php $destinations = \App\Models\Destination::with('packages')->get(); @endphp
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}"
                                        data-base-price="{{ $destination->packages->avg('package_price') ?? 100 }}"
                                        data-name="{{ $destination->name }}">
                                        {{ $destination->name }}
                                        @if ($destination->packages->count() > 0)
                                            ({{ $destination->packages->count() }} packages)
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Duration --}}
                        <div>
                            <label for="duration_range"
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                                <i class="ri-calendar-line mr-1 text-orange-500"></i> Duration
                            </label>
                            <select id="duration_range" name="duration_range"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                                required onchange="updateCustomPricing()">
                                <option value="">Select duration...</option>
                                <option value="3" data-multiplier="1">3 Days — Short Trip</option>
                                <option value="5" data-multiplier="1.2">5 Days — Standard</option>
                                <option value="7" data-multiplier="1.4">7 Days — Extended</option>
                                <option value="10" data-multiplier="1.6">10 Days — Long Adventure</option>
                                <option value="14" data-multiplier="1.8">14 Days — Full Experience</option>
                            </select>
                        </div>

                        {{-- Number of People --}}
                        <div>
                            <label for="num_people"
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                                <i class="ri-group-line mr-1 text-orange-500"></i> Number of People
                            </label>
                            <input type="number" id="num_people" name="num_people" min="1" max="20"
                                value="2"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                                required onchange="updateCustomPricing()" oninput="updateCustomPricing()">
                            <p class="text-xs text-orange-500 mt-1">Group discounts apply for 5+ people</p>
                        </div>

                        {{-- Travel Date --}}
                        <div>
                            <label for="travel_date"
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                                <i class="ri-calendar-event-line mr-1 text-orange-500"></i> Travel Date
                            </label>
                            <input type="date" id="travel_date" name="travel_date"
                                min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-gray-50 text-gray-700"
                                required>
                        </div>

                        {{-- Package Type --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                <i class="ri-star-line mr-1 text-orange-500"></i> Package Type
                            </label>
                            <div class="grid grid-cols-3 gap-2">
                                <label class="cursor-pointer">
                                    <input type="radio" name="package_type" value="budget" data-multiplier="0.8"
                                        class="peer hidden" onchange="updateCustomPricing()">
                                    <div
                                        class="peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-600 border border-gray-200 rounded-xl p-3 text-center text-xs font-bold text-gray-500 transition-all duration-200 hover:border-orange-300">
                                        <i class="ri-wallet-line block text-lg mb-1"></i> Budget
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="package_type" value="standard" data-multiplier="1"
                                        class="peer hidden" checked onchange="updateCustomPricing()">
                                    <div
                                        class="peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 border border-gray-200 rounded-xl p-3 text-center text-xs font-bold text-gray-500 transition-all duration-200 hover:border-blue-300">
                                        <i class="ri-shield-check-line block text-lg mb-1"></i> Standard
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="package_type" value="luxury" data-multiplier="1.5"
                                        class="peer hidden" onchange="updateCustomPricing()">
                                    <div
                                        class="peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-600 border border-gray-200 rounded-xl p-3 text-center text-xs font-bold text-gray-500 transition-all duration-200 hover:border-orange-300">
                                        <i class="ri-vip-crown-line block text-lg mb-1"></i> Luxury
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Right Side - Price Summary --}}
                    <div class="bg-blue-900 rounded-2xl shadow-sm p-6 flex flex-col justify-between"
                        style="min-height: 100%;">
                        <div>
                            <h3 class="text-white font-semibold mb-5"
                                style="font-family: 'DM Serif Display', Georgia, serif; font-size: 1.4rem;">
                                Price Summary
                            </h3>

                            <div class="space-y-3" id="customPriceSummary">
                                <div class="flex justify-between items-center">
                                    <span class="text-blue-200 text-sm">Destination</span>
                                    <span id="customSelectedDestination" class="text-white text-sm font-semibold">Not
                                        selected</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-blue-200 text-sm">Duration</span>
                                    <span id="customSelectedDuration" class="text-white text-sm font-semibold">Not
                                        selected</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-blue-200 text-sm">People</span>
                                    <span id="customSelectedPeople" class="text-white text-sm font-semibold">2</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-blue-200 text-sm">Package Type</span>
                                    <span id="customSelectedType" class="text-white text-sm font-semibold">Standard</span>
                                </div>

                                <div class="border-t border-blue-700 my-2 pt-3 space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-blue-200 text-sm">Base Price / person / day</span>
                                        <span id="customBasePrice" class="text-white text-sm font-semibold">$0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-blue-200 text-sm">Subtotal</span>
                                        <span id="customSubtotal" class="text-white text-sm font-semibold">$0</span>
                                    </div>
                                    <div class="flex justify-between items-center text-orange-400" id="customDiscountRow"
                                        style="display: none;">
                                        <span class="text-sm">Group Discount (10%)</span>
                                        <span id="customDiscount" class="text-sm font-semibold">-$0</span>
                                    </div>
                                </div>

                                <div class="border-t border-blue-700 pt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-white font-bold text-base">Total Price</span>
                                        <span id="customTotalPrice" class="text-orange-400 font-extrabold text-2xl"
                                            style="font-family: 'DM Serif Display', Georgia, serif;">$0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CTA Button --}}
                        <div class="mt-6">
                            @auth
                                <button type="submit"
                                    class="w-full bg-orange-500 hover:bg-orange-400 text-white py-3 px-6 rounded-xl font-bold text-sm transition-all duration-300 hover:scale-105 disabled:opacity-40 disabled:scale-100"
                                    disabled id="customCheckoutBtn" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    <i class="ri-shopping-cart-line mr-2"></i> Book Custom Package
                                </button>
                            @else
                                <button type="button" onclick="redirectToLogin()"
                                    class="w-full bg-orange-500 hover:bg-orange-400 text-white py-3 px-6 rounded-xl font-bold text-sm transition-all duration-300 hover:scale-105 disabled:opacity-40 disabled:scale-100"
                                    disabled id="loginToBookBtn" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    <i class="ri-login-box-line mr-2"></i> Login to Book
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
                <h2 class="text-2xl lg:text-3xl font-extrabold mb-3"
                    style="font-family: 'DM Serif Display', Georgia, serif;">
                    <span class="text-orange-500">Popular</span>
                    <span class="text-blue-700">Destinations</span>
                </h2>

                <!-- Description -->
                <p class="text-sm lg:text-base text-black max-w-2xl mx-auto">
                    Discover our most sought-after travel destinations for unforgettable experiences.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach ($featuredDestinations as $destination)
                    <a href="{{ route('packages') }}?destination={{ $destination->id }}"
                        class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">

                        {{-- Image --}}
                        <div class="relative h-60 overflow-hidden">
                            @if ($destination->photopath)
                                <img src="{{ asset('images/' . $destination->photopath) }}"
                                    alt="{{ $destination->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-blue-800 to-blue-500 flex items-center justify-center">
                                    <i class="ri-landscape-line text-white text-6xl opacity-60"></i>
                                </div>
                            @endif

                            {{-- Always-on dark gradient at bottom --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/75 via-blue-950/10 to-transparent">
                            </div>

                            {{-- Package count badge --}}
                            <div class="absolute top-3 right-3">
                                <span class="bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                    {{ $destination->packages_count }}
                                    {{ $destination->packages_count == 1 ? 'Package' : 'Packages' }}
                                </span>
                            </div>

                            {{-- Name + description pinned to bottom of image --}}
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h3 class="text-white font-bold text-lg leading-snug"
                                    style="font-family: 'Syne', sans-serif;">
                                    {{ $destination->name }}
                                </h3>
                                @if ($destination->description)
                                    <p
                                        class="text-blue-100 text-xs mt-1 line-clamp-2 leading-relaxed max-h-0 overflow-hidden group-hover:max-h-10 transition-all duration-300">
                                        {{ Str::limit($destination->description, 90) }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        {{-- Card Footer --}}
                        <div class="px-4 py-3 flex items-center justify-between border-t border-gray-100">
                            <div class="flex items-center gap-1.5 text-gray-400 text-xs">
                                <i class="ri-map-pin-line text-orange-400 text-sm"></i>
                                <span>Nepal</span>
                            </div>
                            <span
                                class="text-blue-800 text-xs font-bold flex items-center gap-1 group-hover:gap-2 transition-all duration-200">
                                Explore <i class="ri-arrow-right-line"></i>
                            </span>
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
                <h2 class="text-2xl lg:text-3xl font-extrabold mb-3"
                    style="font-family: 'DM Serif Display', Georgia, serif;">
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
                        class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">

                        {{-- Image --}}
                        <div class="relative h-52 overflow-hidden">
                            <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                            {{-- Dark gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/60 via-transparent to-transparent">
                            </div>

                            {{-- Duration badge top-left --}}
                            <div class="absolute top-3 left-3">
                                <span
                                    class="bg-white/90 backdrop-blur-sm text-blue-900 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="ri-time-line text-orange-500"></i>
                                    {{ $package->duration }}
                                </span>
                            </div>

                            {{-- Transportation badge top-right --}}
                            @if ($package->transportation)
                                <div class="absolute top-3 right-3">
                                    <span class="bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                        {{ $package->transportation }}
                                    </span>
                                </div>
                            @endif

                            {{-- Location pinned on image bottom --}}
                            <div class="absolute bottom-3 left-4 flex items-center gap-1">
                                <i class="ri-map-pin-fill text-orange-400 text-sm"></i>
                                <span class="text-white text-xs font-semibold">{{ $package->package_location }}</span>
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="p-4">

                            {{-- Package name --}}
                            <h3 class="text-base font-bold text-gray-900 leading-snug mb-3 group-hover:text-blue-800 transition-colors duration-200"
                                style="font-family: 'Syne', sans-serif;">
                                {{ $package->package_name }}
                            </h3>

                            {{-- Includes row --}}
                            <div class="flex items-center gap-3 mb-4">
                                @if ($package->meals)
                                    <span class="flex items-center gap-1 text-xs text-gray-500">
                                        <i class="ri-restaurant-line text-orange-400"></i> Meals
                                    </span>
                                @endif
                                @if ($package->accommodation)
                                    <span class="flex items-center gap-1 text-xs text-gray-500">
                                        <i class="ri-hotel-line text-orange-400"></i> Stay
                                    </span>
                                @endif
                                @if ($package->transportation)
                                    <span class="flex items-center gap-1 text-xs text-gray-500">
                                        <i class="ri-bus-line text-orange-400"></i> Transport
                                    </span>
                                @endif
                            </div>

                            {{-- Price + CTA --}}
                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                <div>
                                    <span class="text-xs text-gray-400">Starting from</span>
                                    <p class="text-lg font-extrabold text-blue-900">
                                        ${{ number_format($package->package_price) }}</p>
                                </div>
                                <a href="{{ route('packages.read', ['package' => $package->id]) }}"
                                    class="bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold px-4 py-2 rounded-full transition-all duration-200 hover:scale-105 flex items-center gap-1">
                                    View <i class="ri-arrow-right-line"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('packages') }}"
                    class="inline-flex items-center bg-gradient-to-r from-blue-700 to-blue-900 hover:from-blue-800 hover:to-blue-950 text-white px-8 py-2.5 rounded-full font-bold text-sm transition-all duration-300 hover:scale-105 shadow-lg">
                    View All Packages
                    <i class="ri-map-pin-line ml-3"></i>
                </a>
            </div>
        </div>
    </section>
    <script>
        // Custom Package Pricing Calculator
        function updateCustomPricing() {
            const destinationSelect = document.getElementById('destination_id');
            const durationSelect = document.getElementById('duration_range');
            const numPeopleInput = document.getElementById('num_people');
            const selectedType = document.querySelector('input[name="package_type"]:checked');

            if (!destinationSelect || !durationSelect || !numPeopleInput || !selectedType) {
                return;
            }

            const numPeople = parseInt(numPeopleInput.value, 10) || 2;
            const selectedDestination = destinationSelect.options[destinationSelect.selectedIndex];
            const selectedDurationOption = durationSelect.options[durationSelect.selectedIndex];
            const typeMultiplier = parseFloat(selectedType.dataset.multiplier) || 1;
            const typeText = selectedType.value.charAt(0).toUpperCase() + selectedType.value.slice(1);

            // Update display values
            document.getElementById('customSelectedDestination').textContent = selectedDestination?.dataset.name ||
                'Not selected';
            document.getElementById('customSelectedDuration').textContent = selectedDurationOption?.text || 'Not selected';
            document.getElementById('customSelectedPeople').textContent = String(numPeople);
            document.getElementById('customSelectedType').textContent = typeText;

            const basePriceElement = document.getElementById('customBasePrice');
            const subtotalElement = document.getElementById('customSubtotal');
            const totalPriceElement = document.getElementById('customTotalPrice');
            const discountRow = document.getElementById('customDiscountRow');
            const discountElement = document.getElementById('customDiscount');
            const checkoutBtn = document.getElementById('customCheckoutBtn');
            const loginBtn = document.getElementById('loginToBookBtn');
            const virtualPackageIdElement = document.getElementById('virtualPackageId');

            const hasSelection = !!(selectedDestination?.value && durationSelect.value);
            const basePrice = parseFloat(selectedDestination?.dataset.basePrice || '');
            if (!hasSelection || Number.isNaN(basePrice)) {
                if (basePriceElement) basePriceElement.textContent = '$0';
                if (subtotalElement) subtotalElement.textContent = '$0';
                if (totalPriceElement) totalPriceElement.textContent = '$0';
                if (discountRow) discountRow.style.display = 'none';
                if (discountElement) discountElement.textContent = '-$0';
                if (checkoutBtn) checkoutBtn.disabled = true;
                if (loginBtn) loginBtn.disabled = true;
                if (virtualPackageIdElement) virtualPackageIdElement.value = '0';
                return;
            }

            const duration = parseInt(durationSelect.value, 10);
            const pricePerPersonDay = Math.round(basePrice * typeMultiplier);
            const subtotal = pricePerPersonDay * numPeople * duration;

            // Apply group discount for 5+ people
            let total = subtotal;
            let discountAmount = 0;

            if (numPeople >= 5) {
                discountAmount = subtotal * 0.1;
                total = subtotal - discountAmount;
                if (discountRow) discountRow.style.display = 'flex';
                if (discountElement) discountElement.textContent = '-$' + Math.round(discountAmount);
            } else if (discountRow) {
                discountRow.style.display = 'none';
            }

            if (basePriceElement) basePriceElement.textContent = '$' + pricePerPersonDay;
            if (subtotalElement) subtotalElement.textContent = '$' + subtotal;
            if (totalPriceElement) totalPriceElement.textContent = '$' + Math.round(total);

            if (checkoutBtn) checkoutBtn.disabled = false;
            if (loginBtn) loginBtn.disabled = false;
            if (virtualPackageIdElement) virtualPackageIdElement.value = 'custom';
        }

        function redirectToLogin() {
            window.location.href = '{{ route('login') }}';
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateCustomPricing();

            const formElements = [
                document.getElementById('destination_id'),
                document.getElementById('duration_range'),
                document.getElementById('num_people'),
            ];

            formElements.forEach(element => {
                if (element) {
                    element.addEventListener('change', updateCustomPricing);
                    element.addEventListener('input', updateCustomPricing);
                }
            });

            document.querySelectorAll('input[name="package_type"]').forEach(radio => {
                radio.addEventListener('change', updateCustomPricing);
            });
        });
    </script>
@endsection
