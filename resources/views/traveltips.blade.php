@extends('layouts.master')

@section('content')

<!-- Hero Section -->
<div class="bg-gradient-to-r from-lime-500 to-teal-400 py-20">
    <div class="container mx-auto text-center text-white">
        <h1 class="text-5xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-yellow-500">
            Travel Tips for Your Adventures
        </h1>
        <p class="text-lg max-w-2xl mx-auto">
            Explore smarter, travel lighter, and make every journey memorable with these expert tips!
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto mt-16 px-5 md:px-20">
    <!-- Section: Before You Go -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-plane-departure text-green-500 mr-3"></i> Before You Go
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-green-100 shadow-lg rounded-lg p-6 hover:scale-105 hover:bg-opacity-90 transition-all duration-300 ease-in-out" data-aos="fade-up">
                <img src="{{ asset('packingtips2.jpg') }}" alt="Packing Tips" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pack Smart</h3>
                <p class="text-gray-600">Roll your clothes to save space and use packing cubes for better organization.</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-green-100 shadow-lg rounded-lg p-6 hover:scale-105 hover:bg-opacity-90 transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('document.jpg') }}" alt="Documents" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Keep Important Documents Handy</h3>
                <p class="text-gray-600">Always carry digital and physical copies of your passport, visa, and tickets.</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-green-100 shadow-lg rounded-lg p-6 hover:scale-105 hover:bg-opacity-90 transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('research.jpg') }}" alt="Research" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Research Your Destination</h3>
                <p class="text-gray-600">Familiarize yourself with local culture, weather, and safety tips.</p>
            </div>
        </div>
    </div>

    <!-- Section: During Your Trip -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-globe-americas text-blue-500 mr-3"></i> During Your Trip
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-blue-100 shadow-lg rounded-lg p-6 hover:scale-105 transition-all duration-300" data-aos="zoom-in">
                <img src="{{ asset('localculture.jpg') }}" alt="Local Culture" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Embrace Local Culture</h3>
                <p class="text-gray-600">Try local cuisines, learn phrases, and respect traditions.</p>
            </div>
            <div class="bg-blue-100 shadow-lg rounded-lg p-6 hover:scale-105 transition-all duration-300" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('healthtips.jpg') }}" alt="Health Tips" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Stay Hydrated & Healthy</h3>
                <p class="text-gray-600">Drink water, eat fresh foods, and carry a first-aid kit.</p>
            </div>
            <div class="bg-blue-100 shadow-lg rounded-lg p-6 hover:scale-105 transition-all duration-300" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('budgetmanagement.jpg') }}" alt="Budget Management" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Manage Your Budget</h3>
                <p class="text-gray-600">Use budget apps or record expenses to avoid overspending.</p>
            </div>
        </div>
    </div>

    <!-- Section: After Your Trip -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-umbrella-beach text-red-500 mr-3"></i> After Your Trip
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-red-100 shadow-lg rounded-lg p-6 hover:scale-105 transition-all duration-300" data-aos="fade-right">
                <img src="{{ asset('photos.jpg') }}" alt="Photos" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Organize Your Photos</h3>
                <p class="text-gray-600">Sort your travel photos into albums and share them.</p>
            </div>
            <div class="bg-red-100 shadow-lg rounded-lg p-6 hover:scale-105 transition-all duration-300" data-aos="fade-right" data-aos-delay="100">
                <img src="{{ asset('review.jpg') }}" alt="Reviews" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Write Reviews</h3>
                <p class="text-gray-600">Share your experiences to help fellow travelers.</p>
            </div>
            <div class="bg-red-100 shadow-lg rounded-lg p-6 hover:scale-105 transition-all duration-300" data-aos="fade-right" data-aos-delay="200">
                <img src="{{ asset('nexttrip.jpg') }}" alt="Plan Next Trip" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Plan Your Next Adventure</h3>
                <p class="text-gray-600">Start dreaming about your next destination!</p>
            </div>
        </div>
    </div>
</div>

<!-- Call-to-Action -->
<div class="bg-yellow-500 py-10">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready for Your Next Journey?</h2>
        <a href="{{ route('packages') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">
            Explore Our Packages
        </a>
    </div>
</div>
@endsection
