@extends('layouts.master')

@section('content')
<div class="container mx-auto p-8">
    <!-- Package Title -->
    <h1 class="text-5xl font-extrabold text-center text-gray-900 mb-4">{{ $package->name }}</h1>
    <p class="text-center text-lg text-gray-600">Discover the wonders of {{ $package->location }} with this exclusive package!</p>

    <!-- Main Content -->
    <div class="flex flex-wrap mt-12 gap-y-8">
        <!-- Package Image Section -->
        <div class="w-full md:w-1/3 p-4 flex flex-col items-center bg-white shadow-md rounded-lg">
            <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="rounded-lg shadow-lg w-full h-64 object-cover transition-transform duration-500 hover:scale-105">
            <a href="{{ route('packages.read', $package->id) }}" class="block bg-gradient-to-r from-indigo-500 to-blue-600 text-white text-center mt-6 px-6 py-3 rounded-md shadow-lg hover:from-indigo-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                Learn More
            </a>
        </div>
        <div class="w-full md:w-1/3  p-6 bg-white shadow-md rounded-lg">
            <div class="space-y-6">
                <p class="text-lg text-gray-900 flex items-center">
                    <i class="ri ri-map-pin-2-fill text-blue-500 text-xl mr-3"></i>
                    <span><strong>Location:</strong> {{ $package->location }}</span>
                </p>
                <p class="text-lg text-gray-900  flex items-center">
                    <i class="ri ri-money-dollar-circle-line text-green-500 text-xl mr-3"></i>
                    <span><strong>Price:</strong> ${{ number_format($package->price, 2) }}
                        <span class="text-sm text-gray-500">Daily Charge Per Person</span></span>
                </p>

                <!-- Form with Duration Inside -->
                <form method="POST" action="{{ route('bookmarks.store') }}">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->id }}">

                    <!-- Duration Select -->
                    <label for="duration_range" class="text-lg text-gray-900 font-bold flex items-center"><i class="ri ri-time-line text-yellow-500 text-xl mr-3"></i>Select Duration:</label>
                    <div class="relative mb-4">
                        <select id="duration_range" name="duration_range" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                            @for ($i = $package->duration; $i <= $package->duration + 5; $i++)
                                <option value="{{ $i }}">{{ $i }} days</option>
                                @endfor
                        </select>
                    </div>

                    <!-- Number of People -->
                    <label for="num_people" class="block text-gray-900 font-bold mb-2"><i class="ri ri-user-line text-red-500 text-xl mr-3"></i>Number of People:</label>
                    <input type="number" id="num_people" name="num_people" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all mb-4" min="1" value="1" required>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-lg shadow-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 flex items-center justify-center">
                        <i class="ri ri-bookmark-line mr-2"></i> Add to My-Plan
                    </button>
                </form>
            </div>
        </div>



        <!-- Sidebar Section -->
        <div class="w-full md:w-1/3 p-4 flex flex-col bg-white shadow-md rounded-lg">
            <div class="space-y-6">
                <a href="{{ route('whyToChooseUs') }}" class="block p-6 bg-blue-50 border-l-4 border-blue-500 text-blue-700 hover:bg-blue-200 transition-all duration-300 rounded-lg shadow-md">
                    <p class="font-bold text-xl">Why Choose Us</p>
                    <p class="text-sm mt-1">See why this package stands out.</p>
                </a>
                <a href="{{ route('adventure') }}" class="block p-6 bg-green-50 border-l-4 border-green-500 text-green-700 hover:bg-green-200 transition-all duration-300 rounded-lg shadow-md">
                    <p class="font-bold text-xl">Adventure Activities</p>
                    <p class="text-sm mt-1">Experience exciting adventures like trekking.</p>
                </a>
                <a href="{{ route('traveltips') }}" class="block p-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700 hover:bg-yellow-200 transition-all duration-300 rounded-lg shadow-md">
                    <p class="font-bold text-xl">Travel Tips</p>
                    <p class="text-sm mt-1">Get the best tips for a memorable journey.</p>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-4">User Reviews</h2>
    @if ($reviews->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($reviews as $review)
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-4">
                <!-- Display Initial as Profile Image -->
                <div class="mr-4 flex items-center justify-center bg-gray-400 w-12 h-12 rounded-full text-white font-semibold">
                    <!-- Get First Character of the User's Name -->
                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                </div>
                <div>
                    <!-- Reviewer Name and Country -->
                    <h3 class="text-xl font-bold text-gray-800">{{ $review->user->name }}</h3>
                    <p class="text-gray-500">{{ $review->user->country }}</p>
                </div>
            </div>
            <!-- Review Text -->
            <p class="text-gray-700 mb-2">{{ $review->review }}</p>
            <div class="mt-2 text-yellow-500">
                <!-- Rating -->
                Rating:
                <span class="text-yellow-400">
                    {{ str_repeat('★', $review->rating) }}
                </span>
                <span class="text-gray-300">
                    {{ str_repeat('☆', 5 - $review->rating) }}
                </span>
            </div>
            <!-- Review Date -->
            <p class="text-sm text-gray-500 mt-2">Reviewed on: {{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y') }}</p>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded-lg">
        <p>No reviews yet. Be the first to leave a review!</p>
    </div>
    @endif
</div>


    <!-- Add Review Form -->
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
                    <div class="flex items-center space-x-2" id="starRating">
                        @for($i = 1; $i <= 5; $i++)
                            <label>
                            <input type="radio" name="rating" value="{{ $i }}" class="hidden">
                            <svg data-value="{{ $i }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="star w-8 h-8 text-gray-300 hover:text-yellow-400 cursor-pointer transition duration-200" viewBox="0 0 24 24">
                                <path d="M12 .587l3.668 7.431 8.215 1.192-5.945 5.798 1.402 8.192L12 18.902l-7.34 3.798 1.402-8.192L.873 9.21l8.215-1.192L12 .587z" />
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
    </div>
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
<script>
    // Select all star elements
    const stars = document.querySelectorAll('#starRating .star');

    // Add click event listener to each star
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            // Remove yellow color from all stars
            stars.forEach(s => s.classList.remove('text-yellow-400'));
            // Add yellow color to all stars up to and including the clicked star
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('text-yellow-400');
            }
        });
    });
</script>
@endsection
