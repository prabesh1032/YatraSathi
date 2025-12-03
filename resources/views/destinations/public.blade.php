@extends('layouts.master')

@section('content')
<!-- Header Section -->
<header class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white px-4">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-400 drop-shadow-lg mb-4">
            Explore Destinations
        </h1>
        <p class="text-xl md:text-2xl mb-6 font-medium">
            Discover amazing places around the world with YatraSathi
        </p>
    </div>
</header>

<!-- Destinations Grid Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Popular Destinations</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Choose from our carefully curated destinations and start your adventure
            </p>
        </div>

        @if($destinations->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($destinations as $destination)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                        <div class="relative overflow-hidden">
                            @if($destination->photopath)
                                <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-64 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                    <i class="ri-map-pin-line text-white text-6xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4 bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-bold">
                                {{ $destination->packages->count() }} Packages
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $destination->name }}</h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                {{ $destination->description ? Str::limit($destination->description, 120) : 'Discover this amazing destination with our expert guides and carefully crafted packages.' }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    <i class="ri-map-pin-line mr-1"></i>
                                    @if($destination->latitude && $destination->longitude)
                                        {{ number_format($destination->latitude, 2) }}°, {{ number_format($destination->longitude, 2) }}°
                                    @else
                                        Coordinates not available
                                    @endif
                                </div>
                                <a href="{{ route('destinations.show', $destination->id) }}" class="bg-indigo-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-indigo-700 transition-colors duration-300 flex items-center">
                                    Explore
                                    <i class="ri-arrow-right-line ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <i class="ri-map-pin-line text-6xl text-gray-300 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-600 mb-4">No destinations available</h3>
                <p class="text-gray-500 mb-6">We're working on adding amazing destinations for you to explore.</p>
                <a href="{{ route('home') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-indigo-700 transition-colors duration-300">
                    Back to Home
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-indigo-600 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready for Your Next Adventure?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Browse our packages or contact us to create a custom travel experience just for you.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-yellow-500 text-black px-8 py-3 rounded-full font-bold hover:bg-yellow-400 transition-colors duration-300">
                Plan Your Trip
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-indigo-600 transition-all duration-300">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
