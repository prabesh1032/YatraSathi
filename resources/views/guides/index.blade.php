@extends('layouts.app')

@section('title', 'Guides')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Our Guides</h1>
        <a href="{{ route('guides.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Add New Guide</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($guides as $guide)
        <div class="shadow-lg rounded-lg bg-white overflow-hidden hover:shadow-xl transition-shadow duration-300">
            @if($guide->photopath)
            <img src="{{ asset('images/' . $guide->photopath) }}" alt="{{ $guide->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
            @endif
            <div class="p-4">
                <h3 class="text-xl font-bold text-gray-900">{{ $guide->name }}</h3>
                <div class="text-gray-700 mt-2 flex items-center">
                    <i class="ri-map-pin-2-line text-green-500 mr-2"></i> Package: {{ $guide->package->name }}
                </div>
                <!-- Email -->
                <!-- <div class="text-gray-700 mt-2 flex items-center">
                    <i class="ri-mail-line text-blue-500 mr-2"></i> Email: {{ $guide->email }}
                </div> -->
                <!-- Experience -->
                <div class="text-gray-700 mt-2 flex items-center">
                    <i class="ri-award-line text-yellow-500 mr-2"></i> Experience: {{ $guide->experience }} years
                </div>

                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('guides.edit', $guide->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition duration-300">Edit</a>
                        <a href="{{ route('guides.destroy', $guide->id) }}"
                            class="bg-red-700 text-white px-3 py-1.5 rounded-lg shadow-md hover:bg-red-800 transition duration-300"
                            onclick="return confirm('Are you sure to delete')">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
