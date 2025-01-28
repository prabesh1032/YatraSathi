@extends('layouts.master')

@section('content')
<div class="container mx-auto px-1 py-10">
    <!-- Packages Title -->
    <div class="text-center mb-12">
        <h1 class="text-6xl font-extrabold text-gray-900 mb-4">
            Packages for <span class="text-yellow-500">"{{ $location }}"</span>
        </h1>
        <p class="text-xl text-gray-600">Explore the best travel packages crafted just for you.</p>
    </div>

    <!-- Package Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 px-3 md:px-20 mb-10">
        @forelse($packages as $package)
        <div class="p-5 border shadow-lg text-center rounded-lg bg-gradient-to-br from-yellow-100 to-gray-100 hover:shadow-2xl hover:-translate-y-2 transform transition duration-300 ease-in-out">
            <!-- Package Name -->
            <a href="{{ route('packages.read', $package->id) }}" class="text-3xl font-extrabold text-gray-900 hover:text-indigo-600 transition-colors duration-300">
                {{ $package->name }}
            </a>

            <!-- Image and Info Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
                <!-- Package Image -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/' . $package->photopath) }}" alt="Package Image" class="w-full h-64 object-cover rounded-lg shadow-sm">
                </div>

                <!-- Package Details -->
                <div class="flex flex-col gap-3">
                    <!-- Location -->
                    <p class="text-gray-900 flex text-xl font-extrabold items-center gap-2">
                        <i class="ri-map-pin-line text-red-500"></i>
                        <span>Location: <span class="font-bold">{{ $package->location }}</span></span>
                    </p>

                    <!-- Duration -->
                    <p class="text-gray-900 flex text-xl font-extrabold items-center gap-2">
                        <i class="ri-calendar-line text-blue-500"></i>
                        <span>Duration: <span class="font-bold">{{ $package->duration }} days</span></span>
                    </p>

                    <!-- Price Section with Proper Alignment -->
                    <p class="text-green-500 flex text-xl items-center gap-2">
                        <i class="ri-money-dollar-circle-line text-green-500"></i>
                        <span class="font-bold">${{ number_format($package->price, 2) }}</span>
                        <span class="font-bold text-black"> Per Person</span>
                    </p>
                    <!-- Buttons -->
                    <div class="flex justify-between mt-5">
                        <a href="{{ route('packages.read', $package->id) }}" class="bg-indigo-600 text-white px-3 py-2 rounded-lg hover:bg-indigo-700 shadow-md transition">
                            <i class="ri-bookmark-line mr-2"></i>Learn More
                        </a>
                        <a href="{{ route('packages.show', $package->id) }}" class="bg-green-500 text-white px-3 py-2 rounded-lg hover:bg-green-600 shadow-md transition">
                            <i class="ri-eye-line mr-2"></i>Explore
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- No Packages Found Section -->
        <div class="text-center w-full col-span-full">
            <img src="{{ asset('notfound.jpg') }}" alt="No Results Found" class="mx-auto w-1/3 h-auto mb-6">
            <h2 class="text-4xl font-bold text-gray-500">No Packages Found</h2>
            <p class="text-lg text-gray-600 mt-4">Try adjusting your search or explore our <a href="{{ route('packages') }}" class="text-indigo-600 font-bold hover:underline">available packages</a>.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
