@extends('layouts.app')
@section('title', 'Destinations')
@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Manage Destinations</h1>
        <a href="{{ route('destinations.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 flex items-center">
            <i class="ri-add-line mr-2"></i>Add Destination
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($destinations as $destination)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                @if($destination->photopath)
                    <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <i class="ri-image-line text-gray-400 text-4xl"></i>
                    </div>
                @endif

                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $destination->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($destination->description, 100) }}</p>

                    @if($destination->latitude && $destination->longitude)
                        <p class="text-sm text-gray-500 mb-4">
                            <i class="ri-map-pin-line mr-1"></i>
                            {{ $destination->latitude }}, {{ $destination->longitude }}
                        </p>
                    @endif

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">
                            {{ $destination->packages_count ?? $destination->packages->count() }} packages
                        </span>
                        <div class="flex space-x-2">
                            <a href="{{ route('destinations.edit', $destination->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300">
                                <i class="ri-edit-line"></i>
                            </a>
                            <a href="{{ route('destinations.destroy', $destination->id) }}"
                               onclick="return confirm('Are you sure you want to delete this destination?')"
                               class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <i class="ri-map-pin-line text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No destinations found</h3>
                <p class="text-gray-500 mb-4">Start by adding your first destination</p>
                <a href="{{ route('destinations.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                    <i class="ri-add-line mr-2"></i>Add Destination
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
