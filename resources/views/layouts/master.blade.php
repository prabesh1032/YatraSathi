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
    <nav class="bg-black top-0 sticky z-10 text-white py-5">
        <div class="container mx-auto flex justify-between items-center px-0">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('SS2.png') }}" alt="YatraSathi Logo" class="w-16 h-16 rounded-full mr-2">
                </a>
                <a href="{{ route('home') }}" class="text-4xl text-gray-50 font-extrabold flex items-center">
                    YatraSathi
                    <i class="ri-earth-line text-cyan-500 ml-2 transition-colors duration-300 hover:text-yellow-500"></i>
                </a>
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
                <a href="{{ route('home') }}" class="group relative hover:text-yellow-500 {{ Route::currentRouteName() == 'home' ? 'text-yellow-500 font-extrabold' : '' }}">
                    Home
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('packages') }}" class="group relative hover:text-yellow-500 {{ Route::currentRouteName() == 'packages' ? 'text-yellow-500 font-extrabold' : '' }}">
                    Packages
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('about') }}" class="group relative hover:text-yellow-500 {{ Route::currentRouteName() == 'about' ? 'text-yellow-500 font-extrabold' : '' }}">
                    About
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('contact') }}" class="group relative hover:text-yellow-500 {{ Route::currentRouteName() == 'contact' ? 'text-yellow-500 font-extrabold' : '' }}">
                    Contact
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>

                @auth
                    <a href="{{ route('bookmarks.index') }}" class="group relative hover:text-yellow-500 {{ Route::currentRouteName() == 'bookmarks.index' ? 'text-yellow-500 font-extrabold' : '' }}">
                    My-Adventure
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="group relative inline-block">
                        @csrf
                        <input type="submit"
                            value="Logout"
                            class="hover:text-yellow-500 cursor-pointer bg-transparent border-0 p-0 text-xl focus:outline-none">
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                    </form>
                @else
                    <a href="/login" class="group relative hover:text-yellow-500 {{ Route::currentRouteName() == 'login' ? 'text-yellow-500 font-extrabold' : '' }}">
                        Login
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
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
        <div id="mobile-menu" class="hidden flex-col space-y-4 text-center bg-black text-white py-4 lg:hidden">
            <a href="{{ route('home') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'home' ? 'text-yellow-500 font-bold' : '' }}">Home</a>
            <a href="{{ route('packages') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'packages' ? 'text-yellow-500 font-bold' : '' }}">Packages</a>
            <a href="{{ route('about') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'about' ? 'text-yellow-500 font-bold' : '' }}">About</a>
            <a href="{{ route('contact') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'contact' ? 'text-yellow-500 font-bold' : '' }}">Contact</a>

            @auth
                <a href="{{ route('bookmarks.index') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'bookmarks.index' ? 'text-yellow-500 font-bold' : '' }}">My-Adventure</a>
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

        @yield('content')


    <!-- Useful Section Above Footer -->
    <section class="bg-gradient-to-r from-lime-200 via-teal-200 to-indigo-200 py-10 ">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 ">
            <div class="flex flex-col items-center">
               <a href="{{route('whyToChooseUs')}}"> <img src="{{ asset('whyus.jpg') }}" alt="Special Offers" class="w-24 h-24 rounded-full shadow-lg mb-4 hover:scale-110 transition duration-300 ease-in-out">
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
    <footer class="bg-black text-white py-10">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 px-6">
        <!-- Logo and Tagline Section -->
        <div class="flex flex-col items-center md:items-start">
            <img src="{{ asset('SS2.png') }}" alt="Logo" class="w-24 h-24 rounded-full shadow-lg bg-white p-2">
            <span class="mt-4 font-bold text-2xl text-yellow-500">YatraSathi<i class="ri-earth-line text-cyan-500 ml-2 transition-colors duration-300 hover:text-yellow-500"></i></span>
        </div>

        <!-- Customer Support Section -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Customer Support</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-question-line mr-2"></i>FAQs</a></li>
                <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-service-line mr-2"></i>Help Center</a></li>
                <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-arrow-right-circle-line mr-2"></i>Cancellation Policy</a></li>            </ul>
        </div>

        <!-- Social Links Section -->
        <div class="flex flex-col items-center md:items-start">
            <h2 class="text-2xl font-bold mb-4">Follow Us:</h2>
            <div class="flex space-x-5">
                <!-- Facebook -->
                <a href="https://facebook.com/prabesh.ach" class="text-gray-300 hover:text-yellow-500">
                    <i class="ri-facebook-line ri-2x"></i>
                </a>
                <!-- Twitter -->
                <a href="https://twitter.com/PrabeshAch33319" class="text-gray-300 hover:text-yellow-500">
                    <i class="ri-twitter-line ri-2x"></i>
                </a>
                <!-- Instagram -->
                <a href="https://instagram.com/prabesh_ach" class="text-gray-300 hover:text-yellow-500">
                    <i class="ri-instagram-line ri-2x"></i>
                </a>
                <!-- Email -->
                <a href="mailto:prabesh11100@gmail.com" class="text-gray-300 hover:text-yellow-500">
                    <i class="ri-mail-line ri-2x"></i>
                </a>
                <!-- Phone -->
                <a href="tel:+9779812965110" class="text-gray-300 hover:text-yellow-500">
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
