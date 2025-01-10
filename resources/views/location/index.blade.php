@extends('layouts.master')

@section('content')

<header class="h-screen w-88 bg-cover mt-0 relative bg-center" style="background-image: url('{{ asset('travelling8.png') }}');">
    <main class="container mx-auto py-12">
        <!-- Overlay for darker background -->
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <!-- Centered Content -->
        <div class="relative flex items-center justify-center w-full h-full">
            <div class="bg-white bg-opacity-30 backdrop-blur-lg rounded-lg shadow-lg p-8 w-full max-w-3xl text-gray-900">
                <!-- Title -->
                <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-6">
                    <i class="ri-earth-line"></i> Select Your <span class="text-indigo-600">Location</span>
                </h2>
                <!-- Grid Layout for Locations -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($locations as $location)
                    <form action="{{ route('packages.byLocation') }}" method="GET">
                        <input type="hidden" name="location" value="{{ $location->location }}">
                        <button type="submit" class="bg-yellow-500 text-black text-lg font-semibold py-3 rounded-lg shadow-md hover:bg-yellow-300 transition w-full">
                            {{ $location->location }}
                        </button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</header>

@endsection
