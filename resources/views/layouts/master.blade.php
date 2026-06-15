<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YatraSathi</title>

    <!-- Preconnect to external domains for faster loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://unpkg.com">

    <!-- Load fonts with display=swap for better performance -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto+Slab:wght@700&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Load icons asynchronously -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" media="print" onload="this.media='all'" />

    <!-- Only load Leaflet on pages that need maps -->
    @if(request()->routeIs('maps.show'))
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script defer src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gradient-to-r from-blue-50 via-white to-green-50 text-gray-800">
    @include('layouts.alert')

<div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white py-2.5 hidden md:block">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center text-sm">

            <!-- Left -->
            <div class="flex items-center space-x-6">
                <a href="mailto:prabesh11100@gmail.com"
                    class="flex items-center space-x-2 hover:text-orange-300 transition-colors duration-300">
                    <i class="ri-mail-line"></i>
                    <span>yatrasathi@gmail.com</span>
                </a>
                <a href="tel:+9779812965110"
                    class="flex items-center space-x-2 hover:text-orange-300 transition-colors duration-300">
                    <i class="ri-phone-line"></i>
                    <span>+977 9812965110</span>
                </a>
            </div>

            <!-- Right -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('contact') }}"
                    class="flex items-center space-x-2 hover:text-orange-300 transition-colors duration-300">
                    <i class="ri-customer-service-2-line"></i>
                    <span>24/7 Support</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-2 hover:text-orange-300 transition-colors duration-300">
                    <i class="ri-hand-coin-line"></i>
                    <span>Best Price Guarantee</span>
                </a>
                <a href="{{ route('about') }}"
                    class="flex items-center space-x-2 hover:text-orange-300 transition-colors duration-300">
                    <i class="ri-shield-check-line"></i>
                    <span>Trusted Travel Partner</span>
                </a>
            </div>
        </div>
    </div>
</div>

<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-24">

            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('SS2.png') }}"
                        class="w-14 h-14 rounded-full object-cover" alt="YatraSathi Logo">
                    <span class="text-3xl font-extrabold text-blue-700">
                        Yatra<span class="text-orange-500">Sathi
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-1 text-sm font-semibold">
                @php
                    $nav = [
                        ['destinations.public','Destinations','ri-map-pin-line'],
                        ['maps.show','Maps','ri-map-pin-2-line'],
                        ['about','About','ri-information-line'],
                        ['contact','Contact','ri-phone-line'],
                        ['guides.show','Guides','ri-contacts-fill'],
                    ];
                @endphp

                @foreach ($nav as [$route,$label,$icon])
                    <a href="{{ route($route) }}"
                        class="relative px-3 py-2 {{ Route::currentRouteName()===$route ? 'text-blue-600' : 'text-gray-700' }} hover:text-blue-600 transition group">
                        <i class="{{ $icon }}"></i> {{ $label }}
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300
                            group-hover:w-full {{ Route::currentRouteName()===$route ? '!w-full' : '' }}"></span>
                    </a>
                @endforeach
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">

                <!-- Search -->
                <form action="{{ route('search') }}" method="GET" class="hidden lg:flex items-center">
                    <input type="search" name="qry" value="{{ request()->qry }}"
                        placeholder="Search..."
                        class="border px-3 py-1.5 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500"
                        minlength="2" required>
                </form>

                <!-- Login/Register Buttons -->
                @guest
                    <a href="/login"
                        class="hidden lg:inline-block px-4 py-2 text-sm font-semibold text-blue-600 border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition duration-300">
                        <i class="ri-login-box-line mr-1"></i>Login
                    </a>
                    <a href="/register"
                        class="hidden lg:inline-block px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300">
                        <i class="ri-user-add-line mr-1"></i>Sign Up
                    </a>
                @endguest

                <!-- USER AVATAR -->
                @auth
                    <div class="relative group">
                        <a href="{{ route('userprofile.edit') }}"
                            class="block w-11 h-11 transition-transform duration-300 hover:scale-105">
                            @if (auth()->user()->profile_picture)
                                <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_picture) }}"
                                    class="w-11 h-11 rounded-full border-2 border-blue-500 object-cover shadow-md">
                            @else
                                <img src="{{ asset('useravatar.avif') }}"
                                    class="w-11 h-11 rounded-full border-2 border-blue-500 object-cover shadow-md">
                            @endif
                        </a>

                        <!-- Dropdown -->
                        <div
                            class="absolute right-0 top-full mt-3 w-64 bg-white rounded-lg shadow-lg
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible
                            transition-all duration-300 z-50">
                            <div class="py-2">
                                <div class="px-4 py-2 border-b">
                                    <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                                </div>

                                <a href="{{ route('userprofile.edit') }}"
                                    class="flex items-center px-4 py-2 hover:bg-gray-100">
                                    <i class="ri-user-settings-line mr-3"></i> Edit Profile
                                </a>

                                <a href="{{ route('preferences.show') }}"
                                    class="flex items-center px-4 py-2 hover:bg-gray-100">
                                    <i class="ri-magic-line mr-3 text-blue-600"></i> AI Preferences
                                </a>

                                <a href="{{ route('historyindex') }}"
                                    class="flex items-center px-4 py-2 hover:bg-gray-100">
                                    <i class="ri-history-line mr-3"></i> Booking History
                                </a>

                                <div class="border-t mt-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50">
                                            <i class="ri-logout-circle-line mr-3"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button id="menu-toggle"
                    class="lg:hidden text-gray-700 hover:text-blue-600 text-2xl">
                    <i class="ri-menu-line"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu"
        class="hidden fixed top-0 left-0 w-3/4 max-w-sm h-full bg-white shadow-2xl z-50
        transform -translate-x-full transition-transform duration-300 lg:hidden">
        <div class="p-6 space-y-4 font-semibold text-gray-700">
            @foreach ($nav as [$route,$label,$icon])
                <a href="{{ route($route) }}" class="block hover:text-blue-600">
                    <i class="{{ $icon }} mr-2"></i>{{ $label }}
                </a>
            @endforeach

            <!-- Mobile Auth Buttons -->
            <div class="border-t pt-4 mt-4 space-y-3">
                @auth
                    <a href="{{ route('userprofile.edit') }}" class="block hover:text-blue-600">
                        <i class="ri-user-line mr-2"></i>Profile
                    </a>
                    <a href="{{ route('historyindex') }}" class="block hover:text-blue-600">
                        <i class="ri-history-line mr-2"></i>My Bookings
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-red-600 hover:text-red-700">
                            <i class="ri-logout-circle-line mr-2"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="/login" class="block px-4 py-2 text-center text-blue-600 border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition duration-300">
                        <i class="ri-login-box-line mr-1"></i>Login
                    </a>
                    <a href="/register" class="block px-4 py-2 text-center text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300">
                        <i class="ri-user-add-line mr-1"></i>Sign Up
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    let isOpen = false;

    function openMenu() {
        mobileMenu.classList.remove('hidden');
        setTimeout(() => {
            mobileMenu.classList.remove('-translate-x-full');
        }, 10);
        document.body.classList.add('overflow-hidden');
        isOpen = true;
    }

    function closeMenu() {
        mobileMenu.classList.add('-translate-x-full');
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
        }, 300);
        document.body.classList.remove('overflow-hidden');
        isOpen = false;
    }

    menuToggle.addEventListener('click', () => {
        isOpen ? closeMenu() : openMenu();
    });

    // Close on ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen) {
            closeMenu();
        }
    });

    // Close when clicking outside menu
    document.addEventListener('click', (e) => {
        if (
            isOpen &&
            !mobileMenu.contains(e.target) &&
            !menuToggle.contains(e.target)
        ) {
            closeMenu();
        }
    });
</script>



    <!-- Main content -->

    @yield('content')


    <!-- Useful Section Above Footer -->
    <section class="bg-gradient-to-r from-lime-200 via-teal-200 to-indigo-200 py-10 ">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 ">
            <div class="flex flex-col items-center">
                <a href="{{ route('whyToChooseUs') }}"> <img src="{{ asset('whyus.jpg') }}" alt="Special Offers"
                        class="w-24 h-24 rounded-full shadow-lg mb-4 hover:scale-110 transition duration-300 ease-in-out">
                    <h2 class="text-2xl font-bold mb-2"><a href="{{ route('whyToChooseUs') }}">Why to Choose Us</h2>
                    <p class="text-center text-gray-700">Discover why thousands trust YatraSathi for personalized
                        travel experiences.</p>
                </a>
            </div>
            <div class="flex flex-col items-center">
                <a href="{{ route('adventure') }}"> <img src="{{ asset('aa.jpg') }}" alt="Customer Reviews"
                        class="w-24 h-24 rounded-full shadow-lg mb-4 hover:scale-110 transition duration-300 ease-in-out">
                    <h2 class="text-2xl font-bold mb-2"><a href="{{ route('adventure') }}">Adventure Activities</h2>
                    <p class="text-center text-gray-700">Join thrilling adventures for unforgettable experiences with
                        YatraSathi.</p>
                </a>
            </div>

            <div class="flex flex-col items-center">
                <a href="{{ route('traveltips') }}"><img src="{{ asset('tip-travel.png') }}" alt="Travel Tips"
                        class="w-24 h-24 rounded-full shadow-lg mb-4 hover:scale-110 transition duration-300 ease-in-out">
                    <h2 class="text-2xl font-bold mb-2"><a href="{{ route('traveltips') }}">Travel Tips</h2>
                    <p class="text-center text-gray-700">Check out our travel tips and guides to make the most out of
                        your next adventure.</p>
                </a>
            </div>

        </div>
    </section>
    <footer class="bg-black text-white py-5">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 px-6">
            <!-- Logo and Tagline Section -->
            <div class="flex flex-col items-center md:items-start">
                <img src="{{ asset('SS2.png') }}" alt="Logo"
                    class="w-24 h-24 rounded-full shadow-lg bg-white p-2">
                <span class="mt-4 font-bold text-2xl text-yellow-500">YatraSathi<i
                        class="ri-earth-line text-cyan-500 ml-2 transition-colors duration-300 hover:text-yellow-500"></i></span>
            </div>

            <!-- Customer Support Section -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Customer Support</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i
                                class="ri-question-line mr-2"></i>FAQs</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i
                                class="ri-service-line mr-2"></i>Help Center</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i
                                class="ri-arrow-right-circle-line mr-2"></i>Cancellation Policy</a></li>
                </ul>
            </div>

            <!-- Social Links Section -->
            <div class="flex flex-col items-center md:items-start">
                <h2 class="text-2xl font-bold mb-4">Follow Us:</h2>
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
        <!-- Footer Bottom Section -->
        <div class="bg-gray-900 text-gray-300 text-center py-5">
            <p>&copy; 2024 YatraSathi | All Rights Reserved</p>
        </div>
    </footer>
</body>

</html>
