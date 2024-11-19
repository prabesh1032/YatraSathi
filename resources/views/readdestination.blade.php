@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row lg:gap-10">
        <div class="lg:w-2/3">
        <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}" class="w-full h-64 lg:h-72 object-contain rounded-lg shadow-lg mb-8">            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $destination->name }}</h1>
            <p class="text-gray-700 mb-8">{{ $destination->description }}</p>
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Why {{ $destination->name }} is Important to Nepal</h3>
                <p class="text-gray-700">
                    {{ $destination->name }} holds a special place in Nepal's cultural and spiritual heritage. As one of the most revered locations in the country, it is an integral part of Nepal’s identity, offering a glimpse into the rich history and vibrant traditions of the region. This destination is known for its stunning natural beauty, including breathtaking landscapes, towering mountains, and serene valleys that attract travelers and pilgrims from around the world.
                </p>
                <p class="text-gray-700 mb-4">
                    Beyond its scenic beauty, {{ $destination->name }} is home to ancient temples, monasteries, and historical landmarks that showcase Nepal's deep spiritual roots. Whether you're seeking adventure, peace, or a chance to immerse yourself in the cultural heritage of Nepal, this destination offers something for every type of traveler.
                </p>
                <p class="text-gray-700">
                    It is not only a place to visit but also a place to experience the essence of Nepal itself. From the warmth of the local communities to the sacred sites that have stood the test of time, {{ $destination->name }} is a must-visit spot for anyone wishing to understand the heart and soul of Nepal.
                </p>
            </div>

        </div>
        <div class="lg:w-1/3 lg:h-auto border border-gray-100">
            <div class="sticky top-20 bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Location: {{ $destination->location }}</h2>
                <p class="text-gray-600 mb-6"><i class="ri-map-pin-line"></i> Popular Attractions: {{ $destination->attractions }}</p>
                <p class="text-gray-600 mb-6"><i class="ri-star-line"></i> Average Rating: {{ $destination->rating }} Stars</p>
                <a href="#" class="bg-blue-600 text-white text-center py-2 px-4 rounded-lg shadow-md block mb-4">Explore More</a>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Contact Us</h3>
                <p class="text-gray-600"><i class="ri-mail-line"></i> <a href="mailto:yatrasathi@gmail.com">yatrasathi@gmail.com</a></p>
                <p class="text-gray-600"><i class="ri-phone-line"></i> <a href="tel:9812965110">9812965110</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
