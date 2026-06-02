<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')

@section('title', 'All Packages - YatraSathi')

@section('content')

{{-- Header Banner --}}
<header class="relative w-full bg-cover bg-center overflow-hidden" style="height: 280px; background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);"></div>
    <div class="relative h-full flex flex-col justify-center items-center text-center px-4">
        <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            ✦ YatraSathi
        </span>
        <h1 class="text-white font-semibold leading-tight mb-3"
            style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
            Our Packages
        </h1>
        <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Explore Nepal's most iconic packages, where beauty meets adventure.
        </p>
    </div>
</header>

{{-- Packages Section --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">

        {{-- Filter + Count bar --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">

            {{-- Count --}}
            <p class="text-blue-900 font-bold text-lg" style="font-family: 'DM Serif Display', Georgia, serif;">
                {{ $packages->count() }} {{ $packages->count() == 1 ? 'Package' : 'Packages' }}
                <span class="text-orange-500">Available</span>
            </p>

            {{-- Sort Dropdown --}}
            <form method="GET" action="{{ route('packages') }}" id="sortForm">
                <select name="sort_by"
                    onchange="document.getElementById('sortForm').submit();"
                    class="px-4 py-2 border border-gray-200 rounded-full text-sm text-gray-700 font-semibold bg-white shadow-sm hover:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200 cursor-pointer"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <option value="price_asc"  {{ request('sort_by') == 'price_asc'  ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="latest"     {{ request('sort_by') == 'latest'     ? 'selected' : '' }}>Latest</option>
                    <option value="shortest"   {{ request('sort_by') == 'shortest'   ? 'selected' : '' }}>Shortest Duration</option>
                    <option value="longest"    {{ request('sort_by') == 'longest'    ? 'selected' : '' }}>Longest Duration</option>
                </select>
            </form>

        </div>

        @if($packages->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($packages as $package)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">

                        {{-- Image --}}
                        <div class="relative h-52 overflow-hidden">
                            @if($package->photopath)
                                <img src="{{ asset('images/' . $package->photopath) }}"
                                    alt="{{ $package->package_name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-800 to-blue-500 flex items-center justify-center">
                                    <i class="ri-landscape-line text-white text-6xl opacity-60"></i>
                                </div>
                            @endif

                            {{-- Dark gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/60 via-transparent to-transparent"></div>

                            {{-- Duration badge top-left --}}
                            <div class="absolute top-3 left-3">
                                <span class="bg-white/90 backdrop-blur-sm text-blue-900 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="ri-time-line text-orange-500"></i>
                                    {{ $package->duration }}
                                </span>
                            </div>

                            {{-- Transportation badge top-right --}}
                            @if($package->transportation)
                                <div class="absolute top-3 right-3">
                                    <span class="bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                        {{ $package->transportation }}
                                    </span>
                                </div>
                            @endif

                            {{-- Location pinned on image bottom --}}
                            <div class="absolute bottom-3 left-4 flex items-center gap-1">
                                <i class="ri-map-pin-fill text-orange-400 text-sm"></i>
                                <span class="text-white text-xs font-semibold"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    {{ $package->package_location }}
                                </span>
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="p-4">

                            {{-- Package name --}}
                            <h3 class="text-base font-bold text-gray-900 leading-snug mb-3 group-hover:text-blue-800 transition-colors duration-200"
                                style="font-family: 'DM Serif Display', Georgia, serif;">
                                {{ $package->package_name }}
                            </h3>

                            {{-- Includes row --}}
                            <div class="flex items-center gap-3 mb-4">
                                @if($package->meals)
                                    <span class="flex items-center gap-1 text-xs text-gray-500"
                                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                        <i class="ri-restaurant-line text-orange-400"></i> Meals
                                    </span>
                                @endif
                                @if($package->accommodation)
                                    <span class="flex items-center gap-1 text-xs text-gray-500"
                                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                        <i class="ri-hotel-line text-orange-400"></i> Stay
                                    </span>
                                @endif
                                @if($package->transportation)
                                    <span class="flex items-center gap-1 text-xs text-gray-500"
                                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                        <i class="ri-bus-line text-orange-400"></i> Transport
                                    </span>
                                @endif
                            </div>

                            {{-- Price + CTA --}}
                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                <div>
                                    <span class="text-xs text-gray-400"
                                        style="font-family: 'Plus Jakarta Sans', sans-serif;">Starting from</span>
                                    <p class="text-lg font-extrabold text-blue-900"
                                        style="font-family: 'DM Serif Display', Georgia, serif;">
                                        ${{ number_format($package->package_price) }}
                                    </p>
                                </div>
                                <a href="{{ route('packages.read', $package->id) }}"
                                    class="bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold px-4 py-2 rounded-full transition-all duration-200 hover:scale-105 flex items-center gap-1"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    View <i class="ri-arrow-right-line"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        @else
            {{-- Empty State --}}
            <div class="text-center py-20">
                <i class="ri-inbox-line text-6xl text-gray-200 mb-4 block"></i>
                <h3 class="text-xl font-semibold text-gray-500 mb-2"
                    style="font-family: 'DM Serif Display', Georgia, serif;">
                    No Packages Available
                </h3>
                <p class="text-gray-400 text-sm mb-6 max-w-sm mx-auto"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    We're working on exciting new packages. Check back soon!
                </p>
                <a href="{{ route('destinations.public') }}"
                    class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-arrow-left-line"></i> Browse Destinations
                </a>
            </div>
        @endif

    </div>
</section>

@endsection
