<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YatraSathi')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

    @if(request()->routeIs('maps.show'))
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script defer src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gradient-to-r from-blue-50 via-white to-green-50 text-gray-800">
    @include('layouts.alert')

    {{-- Top Bar (desktop only) --}}
    <div class="hidden md:block bg-blue-900 text-white" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        <div class="container mx-auto px-6 py-2 flex justify-between items-center text-xs font-semibold">
            <div class="flex items-center gap-6">
                <a href="mailto:yatrasathi@gmail.com" class="flex items-center gap-1.5 hover:text-orange-400 transition-colors">
                    <i class="ri-mail-line"></i> yatrasathi@gmail.com
                </a>
                <a href="tel:+9779812965110" class="flex items-center gap-1.5 hover:text-orange-400 transition-colors">
                    <i class="ri-phone-line"></i> +977 9812965110
                </a>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ route('contact') }}" class="flex items-center gap-1.5 hover:text-orange-400 transition-colors">
                    <i class="ri-customer-service-2-line"></i> 24/7 Support
                </a>
                <a href="{{ route('about') }}" class="flex items-center gap-1.5 hover:text-orange-400 transition-colors">
                    <i class="ri-shield-check-line"></i> Trusted Travel Partner
                </a>
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between h-20">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                    <img src="{{ asset('SS2.png') }}" class="w-11 h-11 rounded-full object-cover" alt="YatraSathi">
                    <span style="font-family: 'DM Serif Display', Georgia, serif; font-size: 1.4rem; color: #1e3a5f;">
                        Yatra<span style="color: #f97316;">Sathi</span>
                    </span>
                </a>

                {{-- Desktop Nav --}}
                @php
                    $nav = [
                        ['destinations.public', 'Destinations'],
                        ['packages',            'Packages'],
                        ['maps.show',           'Map'],
                        ['guides.show',         'Guides'],
                        ['about',               'About'],
                        ['contact',             'Contact'],
                    ];
                @endphp

                <div class="hidden lg:flex items-center gap-1 text-sm font-semibold">
                    @foreach($nav as [$route, $label])
                        <a href="{{ route($route) }}"
                            class="relative px-3 py-2 transition-colors duration-200 group
                            {{ Route::currentRouteName() === $route ? 'text-orange-500' : 'text-gray-600 hover:text-blue-900' }}">
                            {{ $label }}
                            <span class="absolute bottom-0 left-0 h-0.5 bg-orange-500 transition-all duration-300
                                {{ Route::currentRouteName() === $route ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                        </a>
                    @endforeach
                </div>

                {{-- Right: Search + Auth --}}
                <div class="hidden lg:flex items-center gap-3">
                    <form action="{{ route('search') }}" method="GET" class="flex items-center">
                        <div class="relative">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="search" name="qry" value="{{ request()->qry }}"
                                placeholder="Search packages..."
                                class="pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-300 w-44"
                                minlength="2" required>
                        </div>
                    </form>

                    @guest
                        <a href="/login"
                            class="px-4 py-2 text-sm font-bold text-blue-900 border border-blue-900 rounded-full hover:bg-blue-900 hover:text-white transition-all duration-200">
                            Login
                        </a>
                        <a href="/register"
                            class="px-4 py-2 text-sm font-bold text-white bg-orange-500 rounded-full hover:bg-orange-400 transition-all duration-200">
                            Sign Up
                        </a>
                    @endguest

                    @auth
                        <div class="relative group">
                            <button class="flex items-center gap-2 focus:outline-none">
                                @if(auth()->user()->profile_picture)
                                    <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_picture) }}"
                                        class="w-10 h-10 rounded-full border-2 border-orange-400 object-cover">
                                @else
                                    <img src="{{ asset('useravatar.avif') }}"
                                        class="w-10 h-10 rounded-full border-2 border-orange-400 object-cover">
                                @endif
                                <i class="ri-arrow-down-s-line text-gray-500 text-sm"></i>
                            </button>

                            {{-- Dropdown --}}
                            <div class="absolute right-0 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100
                                opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <p class="font-bold text-sm text-gray-800">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="py-1 text-sm">
                                    <a href="{{ route('userprofile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-50">
                                        <i class="ri-user-settings-line text-orange-500"></i> Edit Profile
                                    </a>
                                    <a href="{{ route('preferences.show') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-50">
                                        <i class="ri-magic-line text-orange-500"></i> AI Preferences
                                    </a>
                                    <a href="{{ route('historyindex') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-50">
                                        <i class="ri-history-line text-orange-500"></i> Booking History
                                    </a>
                                    <div class="border-t border-gray-100 mt-1">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-red-500 hover:bg-red-50 text-sm">
                                                <i class="ri-logout-circle-line"></i> Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>

                {{-- Mobile: avatar + hamburger --}}
                <div class="flex items-center gap-3 lg:hidden">
                    @auth
                        <a href="{{ route('userprofile.edit') }}">
                            @if(auth()->user()->profile_picture)
                                <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_picture) }}"
                                    class="w-9 h-9 rounded-full border-2 border-orange-400 object-cover">
                            @else
                                <img src="{{ asset('useravatar.avif') }}"
                                    class="w-9 h-9 rounded-full border-2 border-orange-400 object-cover">
                            @endif
                        </a>
                    @endauth
                    <button id="menu-toggle" class="text-gray-700 hover:text-blue-900 text-2xl p-1">
                        <i class="ri-menu-3-line" id="menu-icon"></i>
                    </button>
                </div>

            </div>
        </div>
    </nav>

    {{-- Mobile Drawer --}}
    <div id="mobile-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <div id="mobile-menu"
        class="fixed top-0 left-0 h-full w-72 bg-white z-50 shadow-2xl transform -translate-x-full transition-transform duration-300 lg:hidden flex flex-col">

        {{-- Drawer Header --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('SS2.png') }}" class="w-9 h-9 rounded-full object-cover" alt="YatraSathi">
                <span style="font-family: 'DM Serif Display', Georgia, serif; font-size: 1.2rem; color: #1e3a5f;">
                    Yatra<span style="color: #f97316;">Sathi</span>
                </span>
            </a>
            <button id="menu-close" class="text-gray-400 hover:text-gray-700 text-xl">
                <i class="ri-close-line"></i>
            </button>
        </div>

        {{-- Nav Links --}}
        <div class="flex-1 overflow-y-auto px-5 py-4 space-y-1 text-sm font-semibold">
            @foreach($nav as [$route, $label])
                <a href="{{ route($route) }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors
                    {{ Route::currentRouteName() === $route ? 'bg-orange-50 text-orange-500' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-900' }}">
                    {{ $label }}
                </a>
            @endforeach

            {{-- Search --}}
            <form action="{{ route('search') }}" method="GET" class="pt-2">
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="search" name="qry" value="{{ request()->qry }}"
                        placeholder="Search packages..."
                        class="w-full pl-9 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        minlength="2" required>
                </div>
            </form>
        </div>

        {{-- Auth Footer --}}
        <div class="px-5 py-4 border-t border-gray-100 space-y-2">
            @guest
                <a href="/login"
                    class="flex items-center justify-center gap-2 w-full py-2.5 text-sm font-bold text-blue-900 border border-blue-900 rounded-full hover:bg-blue-900 hover:text-white transition-all">
                    <i class="ri-login-box-line"></i> Login
                </a>
                <a href="/register"
                    class="flex items-center justify-center gap-2 w-full py-2.5 text-sm font-bold text-white bg-orange-500 rounded-full hover:bg-orange-400 transition-all">
                    <i class="ri-user-add-line"></i> Sign Up
                </a>
            @endguest

            @auth
                <a href="{{ route('historyindex') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:text-blue-900">
                    <i class="ri-history-line text-orange-500"></i> Booking History
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-500 hover:bg-red-50 rounded-xl">
                        <i class="ri-logout-circle-line"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>

    {{-- Page Content --}}
    @yield('content')


    {{-- Footer --}}
    <footer class="bg-blue-950 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

                {{-- Brand --}}
                <div class="sm:col-span-2 lg:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('SS2.png') }}" class="w-12 h-12 rounded-full object-cover bg-white p-1" alt="YatraSathi">
                        <span style="font-family: 'DM Serif Display', Georgia, serif; font-size: 1.3rem;">
                            Yatra<span style="color: #f97316;">Sathi</span>
                        </span>
                    </a>
                    <p class="text-blue-200 text-xs leading-relaxed max-w-xs" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Your trusted travel companion for exploring the beauty and culture of Nepal.
                    </p>
                </div>

                {{-- Explore --}}
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-orange-400 mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">Explore</h4>
                    <ul class="space-y-2 text-sm text-blue-200" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <li><a href="{{ route('destinations.public') }}" class="hover:text-orange-400 transition-colors">Destinations</a></li>
                        <li><a href="{{ route('packages') }}" class="hover:text-orange-400 transition-colors">Packages</a></li>
                        <li><a href="{{ route('maps.show') }}" class="hover:text-orange-400 transition-colors">Map</a></li>
                        <li><a href="{{ route('guides.show') }}" class="hover:text-orange-400 transition-colors">Guides</a></li>
                        <li><a href="{{ route('adventure') }}" class="hover:text-orange-400 transition-colors">Adventures</a></li>
                    </ul>
                </div>

                {{-- Support --}}
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-orange-400 mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">Support</h4>
                    <ul class="space-y-2 text-sm text-blue-200" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <li><a href="{{ route('about') }}" class="hover:text-orange-400 transition-colors">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-orange-400 transition-colors">Contact</a></li>
                        <li><a href="{{ route('traveltips') }}" class="hover:text-orange-400 transition-colors">Travel Tips</a></li>
                        <li><a href="{{ route('whyToChooseUs') }}" class="hover:text-orange-400 transition-colors">Why Choose Us</a></li>
                    </ul>
                </div>

                {{-- Contact + Social --}}
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-orange-400 mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">Connect</h4>
                    <ul class="space-y-2 text-sm text-blue-200 mb-5" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <li><a href="mailto:yatrasathi@gmail.com" class="flex items-center gap-2 hover:text-orange-400 transition-colors"><i class="ri-mail-line"></i> yatrasathi@gmail.com</a></li>
                        <li><a href="tel:+9779812965110" class="flex items-center gap-2 hover:text-orange-400 transition-colors"><i class="ri-phone-line"></i> +977 9812965110</a></li>
                    </ul>
                    <div class="flex items-center gap-3">
                        <a href="https://facebook.com/prabesh.ach" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="ri-facebook-line text-sm"></i>
                        </a>
                        <a href="https://twitter.com/PrabeshAch33319" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="ri-twitter-line text-sm"></i>
                        </a>
                        <a href="https://instagram.com/prabesh_ach" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="ri-instagram-line text-sm"></i>
                        </a>
                        <a href="mailto:prabesh11100@gmail.com" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition-colors">
                            <i class="ri-mail-line text-sm"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-white/10 py-4">
            <div class="container mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-blue-300" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <p>&copy; {{ date('Y') }} YatraSathi. All Rights Reserved.</p>
                <p>Made with <span class="text-orange-400">♥</span> for Nepal</p>
            </div>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose  = document.getElementById('menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const overlay    = document.getElementById('mobile-overlay');

        function openMenu() {
            mobileMenu.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeMenu() {
            mobileMenu.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        menuToggle.addEventListener('click', openMenu);
        menuClose.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMenu();
        });
    </script>

</body>
</html>
