@extends('layouts.master')

@section('title', 'Guide Profile')

@section('content')
<div class=" bg-white">
    <div class="container">
        <!-- Profile Content -->
        <div class="grid lg:grid-cols-3 gap-12 mb-6">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white shadow-md p-6">
                        <!-- Profile Image -->
                        <div class="relative aspect-square w-full mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-2xl transform rotate-2"></div>
                            @if($guide->photopath)
                            <img src="{{ asset('images/' . $guide->photopath) }}"
                                 alt="{{ $guide->name }}"
                                 class="w-full h-full object-cover rounded-2xl shadow-lg transform transition duration-500 hover:scale-95">
                            @else
                            <div class="w-full h-full rounded-2xl bg-gray-100 flex items-center justify-center">
                                <i class="ri-user-line text-gray-400 text-8xl"></i>
                            </div>
                            @endif
                        </div>
                        <!-- Quick Stats -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-xl">
                                <div>
                                    <p class="text-xl font-bold text-gray-800">Experience<i class="ri-compass-3-line font-bold text-xl text-cyan-400"></i></p>
                                    <p class="text-2xl font-bold text-indigo-600">{{ $guide->experience }}+ Years</p>
                                </div>
                                <div>
                                    <p class="text-xl font-bold text-gray-500">Tours Led<i class="ri-group-line text-xl font-bold text-cyan-400"></i></p>
                                    <p class="text-2xl font-bold text-indigo-600">{{ $guide->tours_count }} Tours</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <!-- Hero Section -->
                <div class="relative bg-white shadow-md p-6  overflow-hidden">
                    <div class="relative py-4">
                        <div class="max-w-4xl mx-auto">
                            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                                Meet {{ $guide->name }}
                            </h1>
                            <p class="text-xl text-indigo-400 font-extrabold mb-6">
                                Crafting Unforgettable Adventures Since {{ now()->subYears($guide->experience)->year }}
                            </p>
                            <div class="inline-flex items-center space-x-4 px-6 py-3 rounded-full
                                @if($guide->is_booked) bg-red-500
                                @else bg-green-500
                                @endif">
                                <span class="text-white font-semibold">
                                    {{ $guide->is_booked ? 'Currently Booked' : 'Available for New Adventures' }}
                                </span>
                            </div>
                            <!-- Additional Details -->
                            <div class="mt-6 bg-gray-50 p-6 rounded-lg shadow-lg">
                                <h2 class="text-2xl font-bold text-gray-800 mb-4">Guide Details</h2>
                                <ul class="space-y-3">
                                    <li class="flex items-center">
                                        <i class="ri-earth-line text-xl text-indigo-500 mr-2"></i>
                                        <span class="font-medium text-gray-700">Languages Spoken:</span>
                                        <span class="ml-2 text-gray-600">{{ implode(', ', $guide->languages ?? ['Nepali', 'English']) }}</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="ri-award-line text-xl text-indigo-500 mr-2"></i>
                                        <span class="font-medium text-gray-700">Certifications:</span>
                                        <span class="ml-2 text-gray-600">{{ $guide->certifications ?? 'Certified Adventure Guide' }}</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="ri-lightbulb-line text-xl text-indigo-500 mr-2"></i>
                                        <span class="font-medium text-gray-700">Special Skills:</span>
                                        <span class="ml-2 text-gray-600">{{ $guide->skills ?? 'Expert in cultural and trekking experiences' }}</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="ri-hand-heart-line text-xl text-indigo-500 mr-2"></i>
                                        <span class="font-medium text-gray-700">Approach to Guiding:</span>
                                        <span class="ml-2 text-gray-600">{{ $guide->approach ?? 'Ensuring safety and memorable adventures' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mb-2 h-2 bg-gradient-to-r from-yellow-400 to-yellow-500 "></div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Adventure Specialization</h2>
                    <div class="flex items-start space-x-4">
                        <div class="p-4 bg-yellow-100">
                            <i class="ri-map-pin-line text-3xl text-yellow-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $guide->package->name }}</h3>
                            <p class="text-gray-600 mt-2">{{ $guide->specialization ?? 'Master of immersive travel experiences' }}</p>
                        </div>
                    </div>
                </div>
                <!-- Package Highlights -->
                <div class="relative bg-gradient-to-br from-gray-900 to-gray-800 shadow-xl p-8 text-white overflow-hidden">
                    <div class="absolute inset-0 opacity-10 pattern-topography pattern-yellow-500"></div>
                    <h2 class="text-3xl font-bold mb-6">Signature Experience</h2>
                    <div class="grid md:grid-cols-2 gap-6 relative">
                        <div class="p-6 bg-white/10 backdrop-blur-sm rounded-xl">
                            <h3 class="text-yellow-400 font-semibold mb-3">What to Expect</h3>
                            <ul class="space-y-3">
                                <li class="flex items-center space-x-2">
                                    <i class="ri-checkbox-circle-line text-yellow-400"></i>
                                    <span>Curated local experiences</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="ri-checkbox-circle-line text-yellow-400"></i>
                                    <span>Expert cultural insights</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="ri-checkbox-circle-line text-yellow-400"></i>
                                    <span>Safety-first approach</span>
                                </li>
                            </ul>
                        </div>
                        <div class="p-6 bg-white/10 backdrop-blur-sm rounded-xl">
                            <h3 class="text-yellow-400 font-semibold mb-3">Package Features</h3>
                            <ul class="space-y-3">
                                <li class="flex items-center space-x-2">
                                    <i class="ri-time-line text-yellow-400"></i>
                                    <span>Flexible durations</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="ri-user-star-line text-yellow-400"></i>
                                    <span>Personalized itineraries</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="ri-earth-line text-yellow-400"></i>
                                    <span>Eco-friendly practices</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="text-center bg-white rounded-2xl shadow-md p-8">
                    <div class="max-w-2xl mx-auto">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Ready for Your Adventure?</h3>
                        <p class="text-gray-600 mb-8">Let {{ $guide->name }} guide you through an unforgettable experience</p>
                        @if($guide->is_booked)
                        <button disabled class="bg-gray-400 text-gray-100 font-extrabold px-8 py-4 rounded-md shadow-md cursor-not-allowed">
                            <i class="ri-calendar-check-line mr-3 text-xl"></i>
                            Book Now - {{ $guide->package->name }}
                        </button>
                        @else
                        <a href="{{ route('packages.show', $guide->package->id) }}"
                           class="bg-green-400 text-gray-100 font-extrabold px-8 py-4 rounded-md shadow-md hover:bg-green-500 transition-all duration-300 transform hover:scale-105">
                           <i class="ri-calendar-check-line mr-3 text-xl"></i>
                           Book Now - {{ $guide->package->name }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
