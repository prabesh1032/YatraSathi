<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YatraSathi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gradient-to-r from-blue-50 via-white to-green-50 text-gray-800">
@include('Layouts.alert')
    <!-- Navbar -->
    <nav class="bg-black top-0 sticky z-10 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('SS2.png') }}" alt="YatraSathi Logo" class="w-12 h-12 rounded-full mr-3">
                </a>
                <a href="{{ route('home') }}" class="text-3xl font-bold">YatraSathi</a>
            </div>

            <!-- Hamburger Menu Button (for small screens) -->
            <button
                id="menu-toggle"
                class="text-yellow-500 hover:text-yellow-600 lg:hidden text-2xl focus:outline-none"
            >
                <i class="ri-menu-line"></i>
            </button>

            <!-- Navbar Links -->
            <div id="menu" class="hidden lg:flex lg:space-x-6 text-xl">
                <a href="{{ route('home') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'home' ? 'text-yellow-500 font-bold' : '' }}">Home</a>
                <a href="{{ route('packages') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'packages' ? 'text-yellow-500 font-bold' : '' }}">Packages</a>
                <a href="{{ route('about') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'about' ? 'text-yellow-500 font-bold' : '' }}">About</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'contact' ? 'text-yellow-500 font-bold' : '' }}">Contact</a>

                @auth
                    <a href="{{ route('bookmarks.index') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'bookmarks.index' ? 'text-yellow-500 font-bold' : '' }}">My Bookmarks</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline-block">
                        @csrf
                        <input type="submit" value="Logout" class="hover:text-yellow-500 cursor-pointer">
                    </form>
                @else
                    <a href="/login" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'login' ? 'text-yellow-500 font-bold' : '' }}">Login</a>
                @endauth
            </div>

            <!-- Search Bar -->
            <form action="{{ route('search') }}" method="GET" class="hidden lg:flex items-center">
                <input type="search"
                    placeholder="Search..."
                    class="text-black px-2 py-1 rounded"
                    name="qry"
                    value="{{ request()->qry }}"
                    minlength="2"
                    required>
                <button type="submit" class="bg-yellow-500 text-black px-2 py-1 rounded ml-2">Go</button>
            </form>
        </div>

        <!-- Dropdown Menu for Mobile -->
        <div id="mobile-menu" class="hidden flex flex-col space-y-4 text-center bg-black text-white py-4 lg:hidden">
            <a href="{{ route('home') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'home' ? 'text-yellow-500 font-bold' : '' }}">Home</a>
            <a href="{{ route('packages') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'packages' ? 'text-yellow-500 font-bold' : '' }}">Packages</a>
            <a href="{{ route('about') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'about' ? 'text-yellow-500 font-bold' : '' }}">About</a>
            <a href="{{ route('contact') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'contact' ? 'text-yellow-500 font-bold' : '' }}">Contact</a>

            @auth
                <a href="{{ route('bookmarks.index') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'bookmarks.index' ? 'text-yellow-500 font-bold' : '' }}">My Bookmarks</a>
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <input type="submit" value="Logout" class="hover:text-yellow-500 cursor-pointer">
                </form>
            @else
                <a href="/login" class="hover:text-yellow-500">Login</a>
            @endauth

            <form action="{{ route('search') }}" method="GET" class="mt-4">
                <input type="search"
                    placeholder="Search..."
                    class="text-black px-2 py-1 rounded w-full"
                    name="qry"
                    value="{{ request()->qry }}"
                    minlength="2"
                    required>
                <button type="submit" class="bg-yellow-500 text-black px-2 py-1 rounded mt-2 w-full">Go</button>
            </form>
        </div>
    </nav>
    <!-- Main content -->
    <main class="container mx-auto my-10 px-6">
        @yield('content')
    </main>

    <!-- Useful Section Above Footer -->
    <section class="bg-lime-200 py-10 mt-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 px-6">
            <div class="flex flex-col items-center">
               <a href="{{route('whyToChooseUs')}}"> <img src="{{ asset('whyus.jpg') }}" alt="Special Offers" class="w-24 h-24 rounded-full shadow-lg mb-4">
                <h2 class="text-2xl font-bold mb-2"><a href="{{route('whyToChooseUs')}}">Why to Choose Us</h2>
                <p class="text-center text-gray-700">Discover why thousands trust YatraSathi for personalized travel experiences.</p>
                </a>
            </div>
            <div class="flex flex-col items-center">
            <a href="{{ route('adventure') }}"> <img src="{{ asset('aa.jpg') }}" alt="Customer Reviews" class="w-24 h-24 rounded-full shadow-lg mb-4 hover:scale-110 transition duration-300 ease-in-out">
                <h2 class="text-2xl font-bold mb-2"><a href="{{ route('adventure') }}">Adventure Activities</h2>
                <p class="text-center text-gray-700">Join thrilling adventures for unforgettable experiences with YatraSathi.</p>
            </a>
            </div>

            <div class="flex flex-col items-center">
             <a href="{{ route('traveltips') }}"><img src="{{ asset('tip-travel.png') }}" alt="Travel Tips" class="w-24 h-24 rounded-full shadow-lg mb-4 hover:scale-110 transition duration-300 ease-in-out">
                    <h2 class="text-2xl font-bold mb-2"><a href="{{ route('traveltips') }}">Travel Tips</h2>
                    <p class="text-center text-gray-700">Check out our travel tips and guides to make the most out of your next adventure.</p>
                </a>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-10 mt-10">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-10 px-6">
        <div class="flex flex-col items-center mt-5">
            <img src="{{ asset('SS2.png') }}" alt="Logo" class="w-24 h-24 mx-auto rounded-full shadow-lg bg-white p-2">
            <span class="mt-4 font-bold text-2xl text-yellow-500">YatraSathi</span>
            <p class="mt-4 text-center text-gray-400"></p>
        </div>
        <div>
            <h2 class="text-2xl font-bold mb-4">Customer Support</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-question-line mr-2"></i> FAQs</a></li>
                <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-service-line mr-2"></i> Help Center</a></li>
                <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-arrow-right-circle-line mr-2"></i> Cancellation Policy</a></li>
                <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-shield-check-line mr-2"></i> Travel Insurance</a></li>
            </ul>
        </div>
        <div>
            <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
            <p><i class="ri-mail-line mr-2"></i>Email: <a href="mailto:prabesh11100@gmail.com" class="text-gray-300 hover:text-yellow-500">prabesh11100@gmail.com</a></p>
            <p><i class="ri-phone-line mr-2"></i>Phone: <a href="tel:+9779812965110" class="text-gray-300 hover:text-yellow-500">9812965110</a></p>
            <p><i class="ri-map-pin-line mr-2"></i>Address: 123, Chitwan, Nepal</p>
        </div>
        <div>
            <h2 class="text-2xl font-bold mb-4">Social Links</h2>
            <ul class="space-y-2">
                <li><a href="https://facebook.com/prabesh.ach" class="text-gray-300 hover:text-yellow-500"><i class="ri-facebook-line ri-2x"></i> Facebook</a></li>
                <li><a href="https://twitter.com/PrabeshAch33319" class="text-gray-300 hover:text-yellow-500"><i class="ri-twitter-line ri-2x"></i> Twitter</a></li>
                <li><a href="https://instagram.com/prabesh_ach" class="text-gray-300 hover:text-yellow-500"><i class="ri-instagram-line ri-2x"></i> Instagram</a></li>
            </ul>
        </div>
    </div>
    <div class="bg-gray-900 text-gray-300 text-center py-5">
        <p>&copy; 2024 All rights reserved</p>
    </div>
</footer>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const desktopMenu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
