@extends('layouts.master')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-blue-700">{{ $package->name }}</h1>

    <div class="flex flex-wrap mt-6">
        <!-- Package Image Section (Left) -->
        <div class="w-full md:w-1/3 p-4">
            <!-- Package Image -->
            <div class="mb-6">
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="rounded-lg shadow-lg w-full h-64 object-cover">
            </div>
        </div>

        <!-- Package Details Section (Center) -->
        <div class="w-full md:w-1/3 p-4">
            <div class="space-y-4">
                <p class="text-lg text-gray-600 mb-3">📍 Location: <strong>{{ $package->location }}</strong></p>
                <p class="text-lg text-gray-600 mb-3">💰 Price: <strong>${{ number_format($package->price, 2) }} Per Person</strong></p>
                <p class="text-lg text-gray-600 mb-3">📅 Duration: <strong>{{ $package->duration }} days</strong></p>
                <!-- Bookmark Form -->
                <form method="POST" action="{{ route('bookmarks.store') }}">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->id }}">

                    <!-- Number of People -->
                    <label for="num_people" class="block text-gray-700 font-semibold mb-2">Number of People:</label>
                    <input type="number" id="num_people" name="num_people" class="w-full p-2 border rounded-lg mb-4" min="1" value="1" required>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
                        Add to Bookmarks
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar Section (Right) -->
        <div class="w-full md:w-1/3 p-4">
            <div class="space-y-4">
                <!-- Special Offers -->
                <a href="#" class="block p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-700 hover:bg-blue-100">
                    <p class="font-bold">Special Offers</p>
                    <p class="text-sm">Get exclusive discounts and deals on this package.</p>
                </a>

                <!-- Customer Reviews -->
                <a href="#" class="block p-4 bg-green-50 border-l-4 border-green-500 text-green-700 hover:bg-green-100">
                    <p class="font-bold">Customer Reviews</p>
                    <p class="text-sm">Learn about the experiences of other travelers.</p>
                </a>

                <!-- Travel Tips -->
                <a href="{{ route('traveltips') }}" class="block p-4 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700 hover:bg-yellow-100">
                    <p class="font-bold">Travel Tips</p>
                    <p class="text-sm">Make the most out of your journey with our tips.</p>
                </a>
            </div>
        </div>
        <!-- Description Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Description</h2>
            <p class="text-gray-600 leading-relaxed">{{ $package->description }}</p>
        </div>
        <div class="my-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Related Packages</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedpackages as $relatedpackage)
                <div class="border border-gray-200 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl">
                    <a href="{{ route('packages.show', $relatedpackage->id) }}">
                        <img src="{{ asset('images/' . $relatedpackage->photopath) }}" alt="{{ $relatedpackage->name }}"
                             class="h-56 w-full object-cover transition-transform duration-300 hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900">{{ $relatedpackage->name }}</h3>
                            <p class="text-gray-600 mt-2">USD {{ number_format($relatedpackage->price, 2) }} Per Person</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</div>
@endsection
