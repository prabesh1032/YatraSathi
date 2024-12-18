@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YatraSathi Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="h-screen flex items-center justify-center bg-gradient-to-b from-blue-50 to-white font-[Poppins]">
    <!-- Main Container -->
    <div class="grid grid-cols-1 lg:grid-cols-2 w-full max-w-7xl h-[90%] shadow-2xl rounded-lg overflow-hidden">

        <!-- Left Side: Travel Image with Overlay -->
        <div class="relative">
            <img src="{{ asset('t.jpg') }}" alt="Travel Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-white text-center">
                <h1 class="text-4xl text-yellow-400 font-extrabold uppercase tracking-wide mb-4">Welcome Back!</h1>
                <p class="text-lg">Adventure awaits! Let’s plan your next journey together.</p>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="flex items-center justify-center bg-white">
            <div class="w-10/12 sm:w-8/12">
                <!-- Logo -->
                <div class="mb-6 flex justify-center"><a href="{{ route('packages') }}">
                    <img src="{{ asset('SS2.png') }}" alt="YatraSathi Logo" class="h-20 w-auto ">
                </div></a>
                <!-- Title -->
                <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Login to Your Account</h2>

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <input type="email" name="email" placeholder="Email Address"
                            class="block w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-shadow shadow-sm">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <input type="password" name="password" placeholder="Password"
                            class="block w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-shadow shadow-sm">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="block w-full py-3 bg-indigo-500 text-white text-lg font-bold rounded-lg shadow-md hover:bg-indigo-600 hover:shadow-lg transition transform hover:scale-105">
                        Login
                    </button>
                </form>

                <!-- Links -->
                <div class="mt-6 text-center text-gray-600 text-sm">
                    <p>New to YatraSathi? <a href="http://127.0.0.1:8000/register" class="text-indigo-600 font-semibold hover:underline">Register Here</a></p>
                    <p class="mt-2"><a href="http://127.0.0.1:8000/forgot-password" class="text-indigo-600 font-semibold hover:underline">Forgot Password?</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
