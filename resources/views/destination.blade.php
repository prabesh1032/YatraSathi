@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Explore Destinations</h1>
        <p class="mt-2 text-gray-600">Discover the beautiful destinations we offer in Nepal.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($destinations as $destination)
        <div class="bg-indigo-100 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            @if($destination->photopath)
                <a href="{{ route('destinations.read', $destination->id) }}">
                    <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}"
                    class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
                </a>
            @endif
            <div class="p-4">
                <a href="{{ route('destinations.read', $destination->id) }}" class="text-xl font-bold text-gray-800 hover:text-yellow-500">
                    <h3>{{ $destination->name }}</h3>
                </a>
                <p class="mt-2">{{ Str::limit($destination->description, 100) }}</p>
                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('destinations.read', $destination->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600 transition-colors duration-300">Read More</a>
                        <a href="{{ route('destinations.show', $destination->id) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-600 transition-colors duration-300">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
