@extends('layouts.master')

@section('content')
<!-- Travel Tips Section -->
<section class="bg-gradient-to-r from-white to-indigo-50 py-16 text-gray-900">
    <div class="container mx-auto text-center">
        <!-- Section Title -->
        <h1 class="text-5xl font-extrabold mb-6 text-gray-900 uppercase tracking-wide drop-shadow-md">
            Travel <span class="text-yellow-500">Tips</span> for Your Adventures
        </h1>
        <p class="text-xl text-gray-700 mb-12 max-w-4xl mx-auto leading-relaxed">
            Explore smarter, travel lighter, and make every journey memorable with these expert tips curated just for you.
        </p>

        <!-- Before You Go Section -->
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Before You Go</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mb-12">
            <!-- Tip 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('packingtips2.jpg') }}" alt="Pack Smart"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                        Pack Smart
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Roll your clothes to save space and use packing cubes for better organization.
                    </p>
                </div>
            </div>
            <!-- Tip 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('document.jpg') }}" alt="Keep Documents Handy"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                        Keep Documents Handy
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Always carry digital and physical copies of your passport, visa, and tickets.
                    </p>
                </div>
            </div>
            <!-- Tip 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('research.jpg') }}" alt="Research Your Destination"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                        Research Your Destination
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Familiarize yourself with local culture, weather, and safety tips.
                    </p>
                </div>
            </div>
        </div>

        <!-- During Your Trip Section -->
        <h2 class="text-4xl font-bold text-gray-800 mb-6">During Your Trip</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mb-12">
            <!-- Tip 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('localculture.jpg') }}" alt="Embrace Local Culture"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                        Embrace Local Culture
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Try local cuisines, learn phrases, and respect traditions.
                    </p>
                </div>
            </div>
            <!-- Tip 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('healthtips.jpg') }}" alt="Stay Healthy"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                        Stay Healthy
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Drink water, eat fresh foods, and carry a first-aid kit wherever you go.
                    </p>
                </div>
            </div>
            <!-- Tip 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('budgetmanagement.jpg') }}" alt="Manage Your Budget"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                        Manage Your Budget
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Track expenses and avoid overspending with easy-to-use budget apps.
                    </p>
                </div>
            </div>
        </div>

        <!-- After Your Trip Section -->
        <h2 class="text-4xl font-bold text-gray-800 mb-6">After Your Trip</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Tip 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('photos.jpg') }}" alt="Organize Your Photos"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                        Organize Your Photos
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Sort and share your travel memories with friends and family.
                    </p>
                </div>
            </div>
            <!-- Tip 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('review.jpg') }}" alt="Write Reviews"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                    Write Reviews
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                    Share your experiences to help fellow travelers..
                    </p>
                </div>
            </div>
            <!-- Tip 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                <img src="{{ asset('nexttrip.jpg') }}" alt="Maintain Your Gear"
                    class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                    Plan Your Next Adventure
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                    Start dreaming about your next destination!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
