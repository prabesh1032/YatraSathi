<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YatraSathi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-white text-gray-800">
    <!-- Navbar -->
    <nav class="bg-black text-white">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <div class="text-3xl font-bold">
                <a href="{{ route('home') }}">YatraSathi</a>
            </div>
            <div class="flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-yellow-500">Home</a>
                <a href="{{ route('about') }}" class="hover:text-yellow-500">About</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-500">Contact</a>
                <a href="/login" class="hover:text-yellow-500">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container mx-auto my-10 px-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-10 mt-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-10 px-6">
            <div>
                <h2 class="text-2xl font-bold mb-4">LOGO</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quae sequi a dignissimos dolorum excepturi ut, quaerat qui in soluta officiis perspiciatis, quos inventore necessitatibus sed. Ad iste cupiditate rerum!</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Quick Links</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Home</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">About</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Contact</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-500">Login</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
                <p>Email: <a href="#" class="text-gray-300 hover:text-yellow-500">test@gmail.com</a></p>
                <p>Phone: <a href="#" class="text-gray-300 hover:text-yellow-500">9742538007</a></p>
                <p>Address: 123,<br>Chitwan,<br>Nepall</p>
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
