<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YatraSathi</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gradient-to-r from-blue-50 via-white to-green-50 text-gray-800">
    @include('Layouts.alert')
    <div class="flex justify-between items-center px-4 py-3 bg-yellow-500 text-white shadow-lg">
        <!-- Logo and Main Link -->
        <div>
            <a href="{{ route('home') }}" class="text-2xl text-gray-900 font-extrabold hover:text-indigo-900 flex items-center space-x-2">
                <i class="ri-map-pin-line"></i>
                <span>Travel, Explore, Thrive </span>
            </a>
        </div>

        <!-- Navigation and Authentication -->
        <div class="flex items-center space-x-6">
            @auth
                <!-- User Name and My Adventures -->
                <a href="{{ route('userprofile.edit') }}" class="text-xl text-black font-extrabold hover:text-indigo-500 flex items-center space-x-2">
                    <i class="ri-user-fill"></i>
                    <span>Hi, {{ auth()->user()->name }}</span>
                </a>

                <!-- My Adventures Link with Badge -->
                <div class="relative flex items-center space-x-2">
                    <a href="{{ route('bookmarks.index') }}" class="text-xl text-black font-extrabold hover:text-indigo-500 flex items-center space-x-2 group {{ Route::currentRouteName() == 'bookmarks.index' ? 'text-indigo-500 font-extrabold' : '' }}">
                        <i class="ri-map-pin-fill"></i>
                        <span>My Adventures</span>
                    </a>
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
                        @php
                            $no_of_items = \App\Models\Bookmark::where('user_id', auth()->id())->count();
                        @endphp
                        {{ $no_of_items }}
                    </span>
                </div>

                <!-- My Bookings Link with Badge -->
                <div class="relative flex items-center space-x-2">
                    <a href="{{ route('historyindex') }}" class="text-xl text-black font-extrabold hover:text-indigo-500 flex items-center space-x-2 {{ Route::currentRouteName() == 'historyindex' ? 'text-indigo-500 font-extrabold' : '' }}">
                        <i class="ri-calendar-check-fill"></i>
                        <span>My Bookings</span>
                    </a>
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
                        @php
                            $bookingCount = \App\Models\Order::where('user_id', auth()->id())->count();
                        @endphp
                        {{ $bookingCount }}
                    </span>
                </div>

                <!-- Guides Link -->
                <div class="relative flex items-center space-x-2">
                    <a href="{{ route('guides.show') }}" class="text-xl text-black font-extrabold hover:text-indigo-500 flex items-center space-x-2 group {{ Route::currentRouteName() == 'guides.show' ? 'text-indigo-500 font-extrabold' : '' }}">
                        <i class="ri-contacts-fill"></i>
                        <span>Guides</span>
                    </a>
                </div>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="relative group inline-block">
                    @csrf
                    <button type="submit" class="text-xl text-black font-extrabold hover:text-indigo-500 flex items-center space-x-2">
                        <i class="ri-logout-box-r-line"></i>
                        <span>Logout</span>
                    </button>
                </form>
            @else
                <div class="relative flex items-center space-x-2">
                    <a href="{{ route('guides.show') }}" class="text-xl text-black font-extrabold hover:text-indigo-500 flex items-center space-x-2 group {{ Route::currentRouteName() == 'guides.show' ? 'text-indigo-500 font-extrabold' : '' }}">
                        <i class="ri-contacts-fill"></i>
                        <span>Guides</span>
                    </a>
                </div>
                <!-- Login Link -->
                <a href="/login" class="text-xl font-extrabold text-black hover:text-indigo-500 flex items-center space-x-2 group {{ Route::currentRouteName() == 'login' ? 'text-indigo-500 font-extrabold' : '' }}">
                    <i class="ri-login-box-line"></i>
                    <span>Login</span>
                </a>

                <!-- Register Link -->
                <a href="/register" class="text-xl font-extrabold text-black hover:text-indigo-500 flex items-center space-x-2 group {{ Route::currentRouteName() == 'register' ? 'text-indigo-500 font-extrabold' : '' }}">
                    <i class="ri-user-add-line"></i>
                    <span>Sign up</span>
                </a>
            @endauth
        </div>
    </div>


    <!-- Navbar -->
    <nav class="bg-black top-0 sticky z-20 text-white py-5 px-4 md:px-10">
        <div class="container mx-auto flex justify-between items-center px-0">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('SS2.png') }}" alt="YatraSathi Logo" class="w-12 h-12 rounded-full mr-2 md:w-16 md:h-16">
                </a>
                <a href="{{ route('home') }}" class="text-3xl md:text-4xl text-white font-extrabold flex items-center">
                    YatraSathi
                    <i class="ri-earth-line text-cyan-500 ml-2 transition-colors duration-300 hover:text-yellow-500"></i>
                </a>
            </div>

            <!-- Hamburger Menu Button (for small screens) -->
            <button id="menu-toggle" class="text-yellow-500 hover:text-yellow-600 lg:hidden text-2xl focus:outline-none">
                <i class="ri-menu-line"></i>
            </button>

            <!-- Navbar Links -->
            <div id="menu" class="hidden lg:flex lg:space-x-6 text-xl">
                <a href="{{ route('packages') }}" class="group relative font-extrabold hover:text-yellow-500 {{ Route::currentRouteName() == 'packages' ? 'text-yellow-500 font-extrabold' : '' }}">
                    <i class="ri-briefcase-5-fill"></i> Packages
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('route.show') }}" class="group relative font-extrabold hover:text-yellow-500 {{ Route::currentRouteName() == 'route.show' ? 'text-yellow-500 font-extrabold' : '' }}">
                    <i class="ri-map-pin-2-line"></i> Maps
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('about') }}" class="group relative font-extrabold hover:text-yellow-500 {{ Route::currentRouteName() == 'about' ? 'text-yellow-500 font-extrabold' : '' }}">
                    <i class="ri-information-line"></i> About
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('contact') }}" class="group relative font-extrabold hover:text-yellow-500 {{ Route::currentRouteName() == 'contact' ? 'text-yellow-500 font-extrabold' : '' }}">
                    <i class="ri-phone-line"></i> Contact
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- Search Bar -->
            <form action="{{ route('search') }}" method="GET" class="hidden lg:flex items-center">
                <input type="search" placeholder="Search..." class="text-black px-2 py-1 rounded" name="qry" value="{{ request()->qry }}" minlength="2" required>
                <button type="submit" class="bg-yellow-500 text-black px-2 py-1 rounded ml-2">Go</button>
            </form>

            @auth
            <a href="{{ route('userprofile.edit') }}" class="block w-10 h-10">
                <img src="{{ asset('useravatar.avif') }}" alt="User Avatar" class="w-10 h-10 rounded-full shadow-lg">
            </a>
            @endauth
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
                <input type="search" placeholder="Search..." class="text-black px-2 py-1 rounded" name="qry" value="{{ request()->qry }}" minlength="2" required>
                <button type="submit" class="bg-yellow-500 text-black px-2 py-1 rounded mt-2">Search</button>
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
    <footer class="bg-black text-white py-5">
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
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500"><i class="ri-arrow-right-circle-line mr-2"></i>Cancellation Policy</a></li>
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
