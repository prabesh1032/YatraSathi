@extends('layouts.master')

@section('title', 'Guides')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Hero Header Section -->
    <div class="text-center mb-4 relative">
        <div class="absolute inset-0 rounded-full blur-3xl -z-10"></div>
        <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-4 leading-tight">
            Meet Our <span class="bg-clip-text text-transparent bg-yellow-500">Expert Guides</span>
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mt-4">
            Explore our certified guides who craft unforgettable adventures with their expertise.
        </p>
    </div>

    <!-- Specialization Filter Form -->
    <form id="filterForm" method="GET" action="{{ route('guides.show') }}" class="mb-8">
        <select class="px-3 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-400 w-full sm:w-64 mx-auto"
                name="specialization" onchange="this.form.submit()">
            <option value="">All Specializations</option>
            @foreach($packages as $package)
                <option value="{{ $package->id }}"
                        @if($package->id == $selectedPackage) selected @endif>
                    {{ $package->name }}
                </option>
            @endforeach
        </select>
    </form>

    <!-- Guides Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($guides as $guide)
        <div class="relative bg-gray-100 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-2 group">
            <!-- Featured Badge -->
            <div class="absolute top-4 right-4 z-10">
                <span class="@if($guide->is_booked) bg-red-500 @else bg-green-500
                            @endif text-white px-3 py-1 rounded-full text-sm font-medium inline-flex items-center">
                    @if($guide->is_booked)
                    <i class="ri-close-circle-line mr-2"></i>Booked
                    @else
                    <i class="ri-checkbox-circle-line mr-2"></i>Available
                    @endif
                </span>
            </div>
            <!-- Guide Details -->
            <div class="p-6">
                <!-- Profile Image -->
                <div class="relative w-40 h-40 mx-auto mb-2">
                    @if($guide->photopath)
                    <img src="{{ asset('images/' . $guide->photopath) }}"
                         alt="{{ $guide->name }}'s profile picture"
                         class="w-full h-full object-cover rounded-full border-4 border-white shadow-lg"
                         loading="lazy">
                    @else
                    <div class="w-full h-full rounded-full bg-gradient-to-br from-gray-100 to-gray-300 flex items-center justify-center border-4 border-white shadow-lg">
                        <i class="ri-user-line text-gray-400 text-6xl"></i>
                    </div>
                    @endif
                </div>

                <div class="text-center mb-1">
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">{{ $guide->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $guide->certifications ?? 'Certified Adventure Guide' }}</p>
                </div>
                <div class="grid grid-cols-2 gap-3 mb-2">
                    <div class="bg-yellow-50 p-3 rounded-lg text-center">
                        <p class="text-2xl font-bold text-yellow-600 mb-1">{{ $guide->experience }}+</p>
                        <span class="text-xs font-medium text-yellow-700">Years Experience</span>
                    </div>
                    <div class="bg-green-50 p-3 rounded-lg text-center">
                        <p class="text-2xl font-bold text-green-600 mb-1">{{ $guide->tours_count }}</p>
                        <span class="text-xs font-medium text-green-700">Tours Led</span>
                    </div>
                </div>

                <!-- Specialization -->
                <div class="bg-yellow-300  p-4 rounded-lg mt-4">
                    <p class="text-gray-900 font-bold flex items-center justify-center">
                        Specializes in: <span class="text-green-700 ml-1">{{ $guide->package->name }}</span>
                    </p>
                </div>
                <!-- View Full Profile Button -->
                <div class="mt-6 text-center">
                    <a href="{{ route('guides.profile', $guide->id) }}"
                       class="inline-flex items-center px-6 py-3 bg-indigo-400 hover:bg-indigo-500 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none">
                        View Full Profile
                        <i class="ri-arrow-right-line ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center w-full col-span-full">
            <img src="{{ asset('notfound.jpg') }}" alt="No Results Found" class="mx-auto w-1/3 h-auto mb-6">
            <p class="text-gray-600 text-lg">No guides available at the moment. Check back soon!</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
