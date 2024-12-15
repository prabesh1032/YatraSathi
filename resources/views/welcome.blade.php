@extends('layouts.master')

@section('content')
<!-- Header Section -->
<header class="relative h-screen w-full bg-cover bg-center" style="background-image: url('{{ asset('home.jpeg') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-70"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-5xl text-black font-extrabold mb-4">Discover Your Next Adventure</h1>
        <p class="text-lg text-white md:text-2xl mb-6">Let us take you places you’ve never been</p>
        <a href="{{ route('packages') }}" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-600 transition transform hover:scale-105">Explore Packages</a>
    </div>
</header>

<!-- Welcome Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-extrabold text-indigo-700 mb-4">Welcome to YatraSathi</h2>
        <p class="text-xl text-gray-600 mb-8">Your trusted travel companion for discovering breathtaking destinations.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('packages') }}" class="px-6 py-3 bg-indigo-500 text-white font-bold rounded-full shadow-lg hover:bg-indigo-600 transition transform hover:scale-105">See Popular Packages</a>
            <a href="{{ route('whyToChooseUs') }}" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-600 transition transform hover:scale-105">Why Choose Us</a>
        </div>
    </div>
</section>



<!-- Popular Packages Section -->
<section id="popular-packages" class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-extrabold text-indigo-700 mb-6">Popular Packages</h2>
        <p class="text-lg text-gray-600 mb-8">Explore our best-selling travel packages curated just for you.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($packages as $package)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->name }}</h3>
                    <p class="text-lg text-gray-600 mb-4">${{ $package->price }}</p>
                    <a href="{{ route('packages') }}" class="block w-full py-2 text-center bg-indigo-500 text-white font-bold rounded-lg shadow-md hover:bg-indigo-600 transition transform hover:scale-105">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            <a href="{{ route('packages') }}" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full shadow-lg hover:bg-yellow-600 transition transform hover:scale-105">View All Packages</a>
        </div>
    </div>
</section>

@endsection
