@extends('layouts.master')

@section('content')

<header class="min-h-screen w-full bg-cover mt-0 relative bg-center pb-16" style="background-image: url('{{ asset('travelling8.png') }}');">
    <main class="container mx-auto py-12">
        <!-- Overlay for darker background -->
        <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black"></div>

        <!-- Centered Content -->
        <div class="relative flex items-center justify-center w-full h-full">
            <div class="bg-white bg-opacity-30 backdrop-blur-lg rounded-xl shadow-2xl p-8 w-full max-w-5xl text-gray-900 ">
                <!-- Title -->
                <h2 class="text-5xl font-extrabold text-center text-white mb-10">
                    <i class="ri-earth-line"></i> Explore Locations Around <span class="text-yellow-500">Nepal</span>
                </h2>

                <!-- Search Bar -->
                <div class="flex items-center justify-center mb-12">
                    <form action="{{ route('search') }}" method="GET" class="flex w-full max-w-2xl">
                        <input
                            type="search"
                            placeholder="Search locations or packages..."
                            class="text-black px-5 py-3 rounded-l-lg border border-gray-300 w-full focus:outline-none focus:ring-4 focus:ring-yellow-500 transition"
                            name="qry"
                            value="{{ request()->qry }}"
                            minlength="2"
                            required>
                        <button
                            type="submit"
                            class="bg-yellow-500 text-black px-6 py-3 rounded-r-lg font-bold hover:bg-yellow-400 hover:shadow-lg transition duration-200">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Cool Grid Layout for Locations -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                    @foreach($packages as $package)
                        <form action="{{ route('packages.byLocation') }}" method="GET" class="group transform transition duration-300 hover:scale-105">
                            <input type="hidden" name="location" value="{{ $package->location }}">
                            <button
                                type="submit"
                                class="relative bg-gray-800 rounded-xl shadow-xl overflow-hidden w-full h-48 flex items-center justify-center transform hover:shadow-2xl transition duration-300">
                                <!-- Background Image with Lazy Loading -->
                                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->location }}"
                                     class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition duration-300" loading="lazy">
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-70 group-hover:opacity-50 transition"></div>
                                <!-- Location Name -->
                                <h3 class="relative text-2xl font-extrabold text-white group-hover:text-yellow-500 transition">
                                    {{ $package->location }}
                                </h3>
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</header>
{{-- smooth scrolling --}}


@endsection
