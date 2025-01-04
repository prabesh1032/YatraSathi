@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | YatraSathi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="h-screen bg-center" style="background-image: url('{{ asset('travelling3.png') }}');">
    <main class = "container mx-auto py-12">
        <!-- Overlay for darker background -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Centered Transparent Form -->
        <div class="relative flex items-center justify-center w- h-full">
            <div class="bg-white bg-opacity-30 backdrop-blur-lg rounded-lg shadow-lg p-8 w-full max-w-md text-gray-900">
                <!-- Title -->
                <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-6">
                    <i class="ri-login-circle-line"></i> Login to <span class="text-indigo-600">YatraSathi<i class="ri-earth-line text-cyan-500 ml-2 transition-colors duration-300 hover:text-yellow-500"></i></span>
                </h2>

                <!-- Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-900">
                            <i class="ri-mail-line"></i> Email Address
                        </label>
                        <input type="email" name="email" id="email" placeholder="Enter your email"
                            class="block w-full mt-1 p-3 rounded-lg border-none bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500">
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-900">
                            <i class="ri-lock-line"></i> Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="Enter your password"
                            class="block w-full mt-1 p-3 rounded-lg border-none bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500">
                        @error('password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="block w-full bg-yellow-500 text-black text-lg font-semibold py-3 rounded-lg shadow-md hover:bg-yellow-600 transition">
                        <i class="ri-arrow-right-line"></i> Login
                    </button>
                </form>

                <!-- Links -->
                <div class="mt-6 text-center text-sm">
                    <p class="text-white font-semibold">
                        New to YatraSathi?
                        <a href="{{ route('register') }}" class="text-gray-900 font-extrabold hover:underline">
                            Register Here <i class="ri-user-add-line"></i>
                        </a>
                    </p>
                    <p class="mt-2 text-white font-semibold">
                        <a href="{{ route('password.request') }}" class="text-gray-900 font-extrabold hover:underline">
                            Forgot Password? <i class="ri-question-line"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
@endsection
