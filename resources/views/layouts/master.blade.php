<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YatraSathi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-white text-gray-800">
@include('Layouts.alert')
    <!-- Navbar -->
    <nav class="bg-black top-0 sticky z-10 text-white py-6">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="flex items-center ">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('SS2.png') }}" alt="YatraSathi Logo" class="w-14 h-14 rounded-full mr-4">
                </a>
                <a href="{{ route('home') }}" class="text-4xl font-bold">YatraSathi</a>
            </div>
            <div class="flex space-x-6 text-xl">
                <a href="{{ route('home') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'home' ? 'text-yellow-500 font-bold' : '' }}">Home</a>
                <a href="{{ route('packages') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'packages' ? 'text-yellow-500 font-bold' : '' }}">Packages</a>
                <a href="{{ route('destinations') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'destinations' ? 'text-yellow-500 font-bold' : '' }}">Destination</a>
                <a href="{{ route('about') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'about' ? 'text-yellow-500 font-bold' : '' }}">About</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'contact' ? 'text-yellow-500 font-bold' : '' }}">Contact</a>

                <!-- Show My Bookmarks Link Only if User is Logged In -->
                @auth
                    <a href="{{ route('bookmarks.store') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'bookmarks.index' ? 'text-yellow-500 font-bold' : '' }}">My Bookmarks</a>
                @endauth
                @auth
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="submit" value="Logout" class="hover:text-yellow-500 cursor-pointer">
                </form>
                @else
                <a href="/login" class="hover:text-yellow-500">Login</a>
                @endauth
            </div>
            <form class="ml-4 ">
                <input type="text" placeholder="Search..." class="text-black px-2 py-1 rounded">
                <button type="submit" class="bg-yellow-500 text-black px-2 py-1 rounded">Go</button>
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
                <img src="{{ asset('special-offer.jpg') }}" alt="Special Offers" class="w-24 h-24 rounded-full shadow-lg mb-4">
                <h2 class="text-2xl font-bold mb-2">Special Offers</h2>
                <p class="text-center text-gray-700">Get the best deals and discounts on our packages. Limited time offers available now!</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('customer-reviews.png') }}" alt="Customer Reviews" class="w-24 h-24 rounded-full shadow-lg mb-4">
                <h2 class="text-2xl font-bold mb-2">Customer Reviews</h2>
                <p class="text-center text-gray-700">Read reviews from our satisfied customers and learn about their travel experiences with YatraSathi.</p>
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
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">FAQs</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Help Center</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Cancellation Policy</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Travel Insurance</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
                <p>Email: <a href="#" class="text-gray-300 hover:text-yellow-500">test@gmail.com</a></p>
                <p>Phone: <a href="#" class="text-gray-300 hover:text-yellow-500">9742538007</a></p>
                <p>Address: 123,<br>Chitwan,<br>Nepal</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Social Links</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Facebook</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Twitter</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Instagram</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-gray-900 text-gray-300 text-center py-5">
            <p>&copy; 2024 All rights reserved</p>
        </div>
    </footer>
</body>
</html>
