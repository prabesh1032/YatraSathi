<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    @include('Layouts.alert')

    <div class="lg:flex">

        <!-- Mobile top bar -->
        <div class="lg:hidden sticky top-0 z-30 flex items-center justify-between bg-blue-950 px-4 py-3 shadow-md">
            <button id="sidebarOpenBtn" class="text-white p-1 -ml-1" aria-label="Open menu">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('SS2.png') }}" alt="Logo" class="h-8 bg-white/10 px-2 py-1 rounded-lg">
            </a>
            <img src="{{ asset('useravatar.avif') }}" alt="User Avatar"
                class="w-8 h-8 rounded-full border-2 border-white/20">
        </div>

        <!-- Mobile overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 z-40 bg-black/50 lg:hidden hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-blue-950 shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out
                   lg:translate-x-0 lg:static lg:z-auto lg:w-60 lg:shrink-0 lg:h-screen lg:sticky lg:top-0">

            <div class="h-full flex flex-col overflow-y-auto">
                <!-- Logo + close button -->
                <div class="flex items-center justify-between px-5 pt-5 pb-4 lg:justify-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('SS2.png') }}" alt="Logo"
                            class="h-10 bg-white/10 px-3 py-1.5 rounded-lg">
                    </a>
                    <button id="sidebarCloseBtn" class="text-white/70 hover:text-white lg:hidden"
                        aria-label="Close menu">
                        <i class="ri-close-line text-2xl"></i>
                    </button>
                </div>

                <span class="px-5 mb-2 text-xs font-semibold uppercase tracking-widest text-blue-300/60">Menu</span>

                <nav class="flex-1 px-3 space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('dashboard') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-dashboard-line text-lg mr-3"></i> Dashboard
                    </a>
                    <a href="{{ route('destinations.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('destinations.*') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-map-pin-line text-lg mr-3"></i> Destinations
                    </a>
                    <a href="{{ route('packages.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('packages.index') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-suitcase-line text-lg mr-3"></i> Packages
                    </a>
                    <a href="{{ route('guides.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('guides.index') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-user-heart-line text-lg mr-3"></i> Guides
                    </a>
                    <a href="{{ route('orders.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('orders.index') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-book-line text-lg mr-3"></i> Bookings
                    </a>
                    <a href="{{ route('reviews.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('reviews.index') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-star-line text-lg mr-3"></i> Reviews
                    </a>
                    <a href="{{ route('messages.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('messages.index') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-message-line text-lg mr-3"></i> Messages
                    </a>
                    <a href="{{ route('travellers.index') }}"
                        class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                        {{ Route::is('travellers.index') ? 'bg-orange-500 text-white' : 'text-blue-100 hover:bg-white/10' }}">
                        <i class="ri-user-line text-lg mr-3"></i> Travellers
                    </a>
                </nav>

                <div class="px-3 pb-5 mt-2 border-t border-white/10 pt-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-red-300 hover:bg-red-500/10 transition-colors duration-150">
                            <i class="ri-logout-box-line text-lg mr-3"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 min-w-0 p-4 sm:p-6 lg:p-8">

            <!-- Desktop header -->
            <div class="hidden lg:flex justify-between items-center mb-6">
                <h1 class="text-3xl sm:text-4xl font-bold text-blue-950">@yield('title')</h1>
                <div class="flex items-center space-x-5">
                    <a href=""
                        class="relative text-blue-900 hover:text-orange-500 transition-colors duration-150">
                        <i class="ri-notification-3-line text-2xl"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-orange-500 text-white text-xs font-bold rounded-full w-4 h-4 flex items-center justify-center">2</span>
                    </a>
                    <img src="{{ asset('useravatar.avif') }}" alt="User Avatar"
                        class="w-10 h-10 rounded-full border-2 border-gray-100">
                </div>
            </div>

            <!-- Mobile page title -->
            <div class="lg:hidden flex items-center justify-between mb-5">
                <h1 class="text-2xl font-bold text-blue-950">@yield('title')</h1>
                <a href="" class="relative text-blue-900">
                    <i class="ri-notification-3-line text-2xl"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-orange-500 text-white text-xs font-bold rounded-full w-4 h-4 flex items-center justify-center">2</span>
                </a>
            </div>

            <hr class="border-gray-200 mb-6">

            @yield('content')
        </div>
    </div>

    <script>
        (function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const openBtn = document.getElementById('sidebarOpenBtn');
            const closeBtn = document.getElementById('sidebarCloseBtn');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            openBtn.addEventListener('click', openSidebar);
            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);

            // Close drawer automatically if the viewport grows into desktop size
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    closeSidebar();
                }
            });
        })();
    </script>
</body>

</html>
