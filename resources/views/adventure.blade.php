@extends('layouts.master')

@section('content')
<!-- Adventure Activities Section -->
<section class="bg-gradient-to-r from-teal-400 to-blue-500 py-16 text-white">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-extrabold mb-8 text-yellow-500">Adventure Awaits!</h1>
        <p class="text-xl mb-12 text-gray-100">Get ready for the adventure of a lifetime. Whether you're seeking the thrill of trekking through rugged mountains, diving into crystal-clear waters, or experiencing the wild on a safari, we have the perfect adventure waiting for you.</p>

        <!-- Adventure Activities Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Trekking -->
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                <img src="{{ asset('trekHimal.jpg') }}" alt="Trekking" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-black mb-4">Trekking in the Himalayas</h3>
                <p class="text-gray-600 mb-4">Embark on an unforgettable journey through the majestic Himalayas, with breathtaking views and a sense of accomplishment.</p>
                <a href="{{ route('packages') }}" class="text-blue-500 font-semibold hover:text-yellow-600">Explore Trekking Packages</a>
            </div>

            <!-- Paragliding -->
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                <img src="{{ asset('Paragliding.jpg') }}" alt="Paragliding" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-black mb-4">Paragliding</h3>
                <p class="text-gray-600 mb-4">Soar above stunning landscapes and feel the rush of freedom as you glide through the air.</p>
                <a href="{{ route('packages') }}" class="text-blue-500 font-semibold hover:text-yellow-600">Explore Paragliding Packages</a>
            </div>

            <!-- Wildlife Safari -->
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                <img src="{{ asset('safari.jpg') }}" alt="Safari" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-black mb-4">Wildlife Safari</h3>
                <p class="text-gray-600 mb-4">Get up close with nature and witness the wild in its natural habitat. Our safaris take you to the heart of some of the world’s best wildlife reserves.</p>
                <a href="{{ route('packages') }}" class="text-blue-500 font-semibold hover:text-yellow-600">Explore Safari Packages</a>
            </div>

            <!-- Mountain Biking -->
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                <img src="{{ asset('biking.jpg') }}" alt="Mountain Biking" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-black mb-4">Mountain Biking</h3>
                <p class="text-gray-600 mb-4">Ride through rugged terrains, challenging trails, and beautiful landscapes on an adrenaline-packed mountain biking adventure.</p>
                <a href="{{ route('packages') }}" class="text-blue-500 font-semibold hover:text-yellow-600">Explore Mountain Biking Packages</a>
            </div>

            <!-- Rafting -->
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                <img src="{{ asset('rafting.jpg') }}" alt="Rafting" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-black mb-4">Rafting Adventures</h3>
                <p class="text-gray-600 mb-4">Paddle through rapids and enjoy the excitement of white-water rafting in breathtaking river landscapes.</p>
                <a href="{{ route('packages') }}" class="text-blue-500 font-semibold hover:text-yellow-600">Join a Rafting Expedition</a>
            </div>

            <!-- Horseback Riding -->
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                <img src="{{ asset('horseriding.jpg') }}" alt="Horseback Riding" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-black mb-4">Horseback Riding</h3>
                <p class="text-gray-600 mb-4">Explore scenic trails on horseback, enjoying the peacefulness of nature with guided riding tours.</p>
                <a href="{{ route('packages') }}" class="text-blue-500 font-semibold hover:text-yellow-600">Book Your Horseback Riding Tour</a>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-12">
            <p class="text-xl mb-4 text-gray-100">Ready to start your adventure? Join us for a thrilling journey and make memories that will last a lifetime.</p>
            <a href="{{ route('packages') }}" class="px-8 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600">View All Adventure Packages</a>
        </div>
    </div>
</section>

@endsection
