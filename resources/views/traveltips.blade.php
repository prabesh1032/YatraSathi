@extends('layouts.master')

@section('content')
<div class="bg-gradient-to-r from-lime-500 to-teal-400 py-20">
    <div class="container mx-auto text-center text-white">
        <h1 class="text-5xl font-bold mb-6">Travel Tips for Your Adventures</h1>
        <p class="text-lg max-w-2xl mx-auto">
            Explore smarter, travel lighter, and make every journey memorable with these expert tips!
        </p>
    </div>
</div>

<div class="container mx-auto mt-16 px-5 md:px-20">
    <!-- Section: Before You Go -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Before You Go</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class=" bg-green-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('packingtips2.jpg') }}" alt="Packing Tips" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pack Smart</h3>
                <p class="text-gray-600">Roll your clothes to save space and avoid overpacking. Use packing cubes for better organization.</p>
            </div>
            <div class=" bg-green-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('document.jpg') }}" alt="Documents" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Keep Important Documents Handy</h3>
                <p class="text-gray-600">Always carry digital and physical copies of your passport, visa, and tickets.</p>
            </div>
            <div class=" bg-green-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('research.jpg') }}" alt="Research" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Research Your Destination</h3>
                <p class="text-gray-600">Familiarize yourself with local culture, weather, and safety tips to make informed decisions.</p>
            </div>
        </div>
    </div>

    <!-- Section: During Your Trip -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">During Your Trip</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-blue-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('localculture.jpg') }}" alt="Local Culture" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Embrace Local Culture</h3>
                <p class="text-gray-600">Try local cuisines, learn a few basic phrases, and show respect to the traditions and people.</p>
            </div>
            <div class="bg-blue-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('healthtips.jpg') }}" alt="Health Tips" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Stay Hydrated & Healthy</h3>
                <p class="text-gray-600">Drink plenty of water, eat fresh foods, and carry a small first-aid kit for emergencies.</p>
            </div>
            <div class="bg-blue-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('budgetmanagement.jpg') }}" alt="Budget Management" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Manage Your Budget</h3>
                <p class="text-gray-600">Use budget apps or keep a simple record of your expenses to avoid overspending.</p>
            </div>
        </div>
    </div>

    <!-- Section: After Your Trip -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">After Your Trip</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-red-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('photos.jpg') }}" alt="Photos" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Organize Your Photos</h3>
                <p class="text-gray-600">Sort and save your travel photos into albums to relive the memories and share them with loved ones.</p>
            </div>
            <div class="bg-red-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('review.jpg') }}" alt="Write Reviews" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Write Reviews</h3>
                <p class="text-gray-600">Share your experiences online to help fellow travelers and support local businesses.</p>
            </div>
            <div class="bg-red-100 shadow-lg rounded-lg p-6 hover:shadow-2xl transition">
                <img src="{{ asset('nexttrip.jpg') }}" alt="Plan Next Trip" class="rounded-lg h-48 w-full object-cover mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Plan Your Next Adventure</h3>
                <p class="text-gray-600">Reflect on what you loved, and start dreaming about your next destination!</p>
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
