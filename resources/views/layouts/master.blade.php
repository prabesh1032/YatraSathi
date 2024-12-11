<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YatraSathi</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
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
               <!-- <a href="{{ route('destinations') }}" class="hover:text-yellow-500 {{ Route::currentRouteName() == 'destinations' ? 'text-yellow-500 font-bold' : '' }}">Destination</a> -->
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
               <a href="{{route('packages')}}"> <img src="{{ asset('special-offer.jpg') }}" alt="Special Offers" class="w-24 h-24 rounded-full shadow-lg mb-4">
                <h2 class="text-2xl font-bold mb-2"><a href="{{route('packages')}}">Special Offers</h2>
                <p class="text-center text-gray-700">Get the best deals and discounts on our packages. Limited time offers available now!</p>
               </a>
            </div>
            <div class="flex flex-col items-center">
            <a href="{{ route('adventure') }}"> <img src="{{ asset('aa.jpg') }}" alt="Customer Reviews" class="w-24 h-24 rounded-full shadow-lg mb-4 hover:scale-110 transition duration-300 ease-in-out">
                <h2 class="text-2xl font-bold mb-2"><a href="{{ route('adventure') }}">Adventure Activities</h2>
                <p class="text-center text-gray-700">Join thrilling adventures like trekking, scuba diving, safaris, and mountain biking for unforgettable experiences with YatraSathi.</p>
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
            <p><i class="ri-mail-line mr-2"></i>Email: <a href="mailto:test@gmail.com" class="text-gray-300 hover:text-yellow-500">test@gmail.com</a></p>
            <p><i class="ri-phone-line mr-2"></i>Phone: <a href="tel:+9779742538007" class="text-gray-300 hover:text-yellow-500">9742538007</a></p>
            <p><i class="ri-map-pin-line mr-2"></i>Address: 123, Chitwan, Nepal</p>
        </div>
        <div>
            <h2 class="text-2xl font-bold mb-4">Social Links</h2>
            <ul class="space-y-2">
                <li><a href="https://facebook.com/yatrasathi" class="text-gray-300 hover:text-yellow-500"><i class="ri-facebook-line ri-2x"></i> Facebook</a></li>
                <li><a href="https://twitter.com/yatrasathi" class="text-gray-300 hover:text-yellow-500"><i class="ri-twitter-line ri-2x"></i> Twitter</a></li>
                <li><a href="https://instagram.com/yatrasathi" class="text-gray-300 hover:text-yellow-500"><i class="ri-instagram-line ri-2x"></i> Instagram</a></li>
            </ul>
        </div>
    </div>
    <div class="bg-gray-900 text-gray-300 text-center py-5">
        <p>&copy; 2024 All rights reserved</p>
    </div>
</footer>

</body>
</html>
