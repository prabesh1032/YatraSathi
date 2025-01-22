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

<body class="font-sans antialiased bg-gradient-to-r from-blue-50 via-white to-green-50">
    @include('Layouts.alert')
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-56 h-screen sticky top-0 bg-cyan-200 shadow-lg">
            <div class="flex flex-col items-center mt-3">
                <a href="{{ route('home') }}"><img src="{{ asset('SS2.png') }}" alt="Logo"
                        class="w-8/12 mx-auto bg-blue-400 p-2 rounded-lg shadow-lg"></a>
            </div>
            <div class="mt-5 space-y-1">
                <a href="{{ route('dashboard') }}" class="p-3 text-gray-700 hover:bg-yellow-300 flex items-center transition duration-200 ease-in-out
    @if(Route::is('dashboard')) bg-yellow-200 @endif">
                    <i class="ri-dashboard-line text-blue-500 mr-2"></i> Dashboard
                </a>
                <a href="{{ route('packages.index') }}" class="p-3 text-gray-700 hover:bg-yellow-300 flex items-center transition duration-200 ease-in-out
    @if(Route::is('packages.index')) bg-yellow-200 @endif">
                    <i class="ri-suitcase-line text-orange-500 mr-2"></i> Packages
                </a>
                <a href="{{ route('guides.index') }}" class="p-3 text-gray-700 hover:bg-yellow-300 flex items-center transition duration-200 ease-in-out
    @if(Route::is('guides.index')) bg-yellow-200 @endif">
                    <i class="ri-user-heart-line text-indigo-500 mr-2"></i> Guides
                </a>
                <a href="{{route('orders.index')}}" class="p-3 text-gray-700 hover:bg-yellow-300 flex items-center transition duration-200 ease-in-out
    @if(Route::is('orders.index')) bg-yellow-200 @endif">
                    <i class="ri-book-line text-green-500 mr-2"></i> Bookings
                </a>
                <a href="{{route('reviews.index')}}" class="p-3 text-gray-700 hover:bg-yellow-400 flex items-center transition duration-200 ease-in-out
    @if(Route::is('reviews.index')) bg-yellow-200 @endif">
                    <i class="ri-star-line text-yellow-500 mr-2"></i> Reviews
                </a>
                <a href="{{ route('messages.index') }}" class="p-3 text-gray-700 hover:bg-yellow-400 flex items-center transition duration-200 ease-in-out
    @if(Route::is('messages.index')) bg-yellow-200 @endif">
                    <i class="ri-message-line text-teal-500 mr-2"></i> Messages
                </a>
                <a href="{{route('travellers.index')}}" class="p-3 text-gray-700 hover:bg-yellow-300 flex items-center transition duration-200 ease-in-out
    @if(Route::is('travellers.index')) bg-yellow-200 @endif">
                    <i class="ri-user-line text-purple-500 mr-2"></i> Travellers
                </a>
                <form action="{{ route('logout') }}" method="POST" class="block p-3 text-gray-700 hover:bg-red-700 text-left transition duration-200 ease-in-out">
                    @csrf
                    <button type="submit" class="w-full flex items-center">
                        <i class="ri-logout-box-line text-red-500 mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-6xl font-bold">@yield('title')</h1>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="ri-notification-3-line text-3xl text-blue-500"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                    </div>
                    <img src="{{ asset('useravatar.avif') }}" alt="User Avatar" class="w-10 h-10 rounded-full">
                </div>
            </div>
            <hr class="h-1 bg-yellow-100 mb-6">
            @php
            $totalbookings = \App\Models\Order::count();
            $totalreviews= \App\Models\Review::count();
            $totalpackages = \App\Models\Package::count();
            $totaltravellers= App\Models\User::count();
            @endphp
            <!-- Quick Stats -->
            <div class="flex flex-col bg-white mb-4 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Quick Stats</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Total Bookings -->
                    <div class="bg-yellow-100 p-4 rounded-lg shadow flex items-center space-x-3">
                        <i class="ri-book-line text-green-600 text-4xl"></i>
                        <div>
                            <p class="text-gray-700">Total Bookings</p>
                            <p class="text-2xl font-bold">{{$totalbookings}}</p>
                        </div>
                    </div>

                    <!-- New Reviews -->
                    <div class="bg-yellow-100 p-4 rounded-lg shadow flex items-center space-x-3">
                        <i class="ri-star-line text-yellow-500 text-4xl"></i>
                        <div>
                            <p class="text-gray-700">New Reviews</p>
                            <p class="text-2xl font-bold">{{$totalreviews}}</p>
                        </div>
                    </div>

                    <!-- Total Travellers -->
                    <div class="bg-yellow-100 p-4 rounded-lg shadow flex items-center space-x-3">
                        <i class="ri-user-line text-purple-500 text-4xl"></i>
                        <div>
                            <p class="text-gray-700">Total Travellers</p>
                            <p class="text-2xl font-bold">{{$totaltravellers}}</p>
                        </div>
                    </div>

                    <!-- Total Packages -->
                    <div class="bg-yellow-100 p-4 rounded-lg shadow flex items-center space-x-3">
                        <i class="ri-suitcase-line text-orange-500 text-4xl"></i>
                        <div>
                            <p class="text-gray-700">Total Packages</p>
                            <p class="text-2xl font-bold">{{$totalpackages}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</body>

</html>
