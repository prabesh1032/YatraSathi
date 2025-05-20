@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="text-center mb-6">
        <h1 class="text-6xl font-extrabold z-10 text-gray-900 mb-4">Your <span class="text-yellow-500">Bookmarked</span> Packages</h1>
        <p class="text-xl text-gray-600">Easily access your favorite travel packages and explore further details.</p>
    </div>

    @if ($bookmarkedPackages->isEmpty())
        <div class="text-center text-gray-600 text-lg">
            <p>You have no bookmarked packages yet. Start exploring and bookmark your favorite ones!</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach ($bookmarkedPackages as $bookmark)
                @if ($bookmark->package)
                    <div class="relative bg-white shadow-lg rounded-xl overflow-hidden transition-all duration-500">
                        <!-- Bookmark Icon -->
                        <div class="absolute top-4 right-4">
                            <button class="bookmark-button" data-package-id="{{ $bookmark->package->id }}">
                                <i class="ri-bookmark-fill text-yellow-500 text-3xl"></i>
                            </button>
                        </div>
                        <!-- Image Section -->
                        @if($bookmark->package->photopath)
                            <a href="{{ route('packages.read', $bookmark->package->id) }}">
                                <img src="{{ asset('images/' . $bookmark->package->photopath) }}" alt="{{ $bookmark->package->name }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                            </a>
                        @endif
                        <div class="p-6">
                            <a href="{{ route('packages.read', $bookmark->package->id) }}" class="block text-3xl font-semibold text-gray-800 hover:text-indigo-600 transition-colors duration-300">
                                {{ $bookmark->package->name }}
                            </a>
                            <p class="text-lg text-gray-600 mt-2 flex items-center">
                                <i class="ri-map-pin-line text-indigo-500 mr-2"></i> {{ $bookmark->package->location }}
                            </p>
                            <p class="text-lg text-gray-600 mt-2 flex items-center">
                                <i class="ri-calendar-line text-indigo-500 mr-2"></i> {{ $bookmark->package->duration }} days
                            </p>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-xl font-bold text-indigo-600">${{ $bookmark->package->price }} <span class="text-sm text-gray-500">Per Person</span></span>
                            </div>
                            <div class="flex space-x-4 mt-4">
                                <a href="{{ route('packages.read', $bookmark->package->id) }}" class="bg-indigo-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">Learn More</a>
                                <a href="{{ route('packages.show', $bookmark->package->id) }}" class="bg-green-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-green-700 transition-all duration-300 transform hover:scale-105">Explore</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center text-gray-600 text-lg">
                        <p>This package is no longer available.</p>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.bookmark-button').forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault();
            const packageId = button.dataset.packageId;
            const icon = button.querySelector('i');

            try {
                const response = await fetch(`/bookmark/add/${packageId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                });
                const data = await response.json();

                if (response.ok) {
                    if (data.message === 'Bookmark removed') {
                        button.closest('.relative').remove();
                    }
                } else {
                    alert(data.message || 'Something went wrong');
                }
            } catch (error) {
                alert('Error communicating with server.');
                console.error(error);
            }
        });
    });
});
</script>

@endsection
