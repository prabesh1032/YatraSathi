@extends('layouts.master')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-blue-700">{{ $package->name }}</h1>

    <div class="flex flex-wrap mt-6">
        <!-- Package Image Section (Left) -->
        <div class="w-full md:w-1/3 p-4">
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
                <form method="POST" action="{{ route('bookmarks.store') }}">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                    <label for="num_people" class="block text-gray-700 font-semibold mb-2">Number of People:</label>
                    <input type="number" id="num_people" name="num_people" class="w-full p-2 border rounded-lg mb-4" min="1" value="1" required>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
                        Add to Bookmarks
                    </button>
                </form>
            </div>
        </div>

        <!-- Sidebar Section (Right) -->
        <div class="w-full md:w-1/3 p-4">
            <div class="space-y-4">
                <a href="#" class="block p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-700 hover:bg-blue-100">
                    <p class="font-bold">Special Offers</p>
                    <p class="text-sm">Get exclusive discounts and deals on this package.</p>
                </a>
                <a href="#" class="block p-4 bg-green-50 border-l-4 border-green-500 text-green-700 hover:bg-green-100">
                    <p class="font-bold">Customer Reviews</p>
                    <p class="text-sm">Learn about the experiences of other travelers.</p>
                </a>
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

        <!-- Review Section -->
        <div class="mt-12">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Add Your Review</h2>

            @auth
            <div class="bg-gradient-to-r from-white to-blue-50 rounded-xl shadow-lg p-8 max-w-3xl mx-auto">
                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->id }}">

                    <!-- Review Input -->
                    <div>
                        <label for="review" class="block text-lg font-bold text-gray-800 mb-2">Your Review</label>
                        <textarea id="review" name="review" rows="4" class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" placeholder="Share your experience with this package..." required></textarea>
                    </div>

                    <!-- Rating Input -->
                    <div>
                        <label class="block text-lg font-bold text-gray-800 mb-2">Rating</label>
                        <div class="flex items-center space-x-2">
                            @for($i = 1; $i <= 5; $i++)
                                <label class="cursor-pointer">
                                    <input type="radio" name="rating" value="{{ $i }}" class="hidden" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 text-gray-300 hover:text-yellow-400 focus:text-yellow-400 transition duration-200" viewBox="0 0 24 24">
                                        <path d="M12 .587l3.668 7.431 8.215 1.192-5.945 5.798 1.402 8.192L12 18.902l-7.34 3.798 1.402-8.192L.873 9.21l8.215-1.192L12 .587z"/>
                                    </svg>
                                </label>
                            @endfor
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 rounded-lg text-lg font-semibold shadow-lg hover:from-blue-600 hover:to-blue-800 transition duration-200 focus:ring focus:ring-blue-400">
                            Submit Your Review
                        </button>
                    </div>
                </form>
            </div>
            @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded-lg max-w-3xl mx-auto">
                <p class="text-center text-lg font-medium">Please <a href="{{ route('login') }}" class="text-blue-600 underline hover:text-blue-800">log in</a> to leave a review.</p>
            </div>
            @endauth


            <!-- Related Packages Section -->
            <h2 class="text-3xl font-bold text-gray-800 mt-12 mb-6">Related Packages</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedpackages as $relatedpackage)
                    <div class="border border-gray-200 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl">
                        <a href="{{ route('packages.show', $relatedpackage->id) }}">
                            <img src="{{ asset('images/' . $relatedpackage->photopath) }}" alt="{{ $relatedpackage->name }}" class="h-56 w-full object-cover transition-transform duration-300 hover:scale-105">
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
