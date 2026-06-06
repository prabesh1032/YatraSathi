@extends('layouts.master')

@section('title', $package->package_name . ' - YatraSathi')

@section('content')

{{-- Hero Image Banner --}}
<div class="relative w-full overflow-hidden" style="height: 420px;">
    @if($package->photopath)
        <img src="{{ asset('images/' . $package->photopath) }}"
            alt="{{ $package->package_name }}"
            class="w-full h-full object-cover"
            style="filter: brightness(0.55);">
    @else
        <div class="w-full h-full bg-gradient-to-br from-blue-900 to-blue-700"></div>
    @endif
    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(10,20,60,0.9) 0%, rgba(10,20,60,0.3) 60%, transparent 100%);"></div>

    {{-- Overlay content --}}
    <div class="absolute bottom-0 left-0 right-0 px-6 pb-8 max-w-6xl mx-auto w-full">
        <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-2"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">✦ YatraSathi</span>
        <h1 class="text-white font-semibold leading-tight mb-3"
            style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 3rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
            {{ $package->package_name }}
        </h1>
        {{-- Quick meta badges --}}
        <div class="flex flex-wrap gap-2">
            <span class="flex items-center gap-1 bg-white/15 backdrop-blur-sm border border-white/20 text-white text-xs font-semibold px-3 py-1.5 rounded-full"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <i class="ri-map-pin-fill text-orange-400"></i> {{ $package->package_location }}
            </span>
            <span class="flex items-center gap-1 bg-white/15 backdrop-blur-sm border border-white/20 text-white text-xs font-semibold px-3 py-1.5 rounded-full"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <i class="ri-time-line text-orange-400"></i> {{ $package->duration }} Nights / {{ $package->duration + 1 }} Days
            </span>
            @if($package->transportation)
                <span class="flex items-center gap-1 bg-orange-500 text-white text-xs font-semibold px-3 py-1.5 rounded-full"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <i class="ri-bus-line"></i> {{ $package->transportation }}
                </span>
            @endif
        </div>
    </div>
</div>

{{-- Main Content --}}
<section class="bg-gray-50 py-14">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="flex flex-col lg:flex-row gap-10">

            {{-- LEFT: Main Content --}}
            <div class="lg:w-2/3 space-y-8">

                {{-- Package At a Glance --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-xl font-bold text-blue-900 mb-5 flex items-center gap-2"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-information-line text-orange-500"></i> Package Overview
                    </h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">

                        <div class="bg-gray-50 rounded-xl p-4 flex flex-col gap-1">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Starting From</span>
                            <span class="text-sm font-bold text-gray-800 flex items-center gap-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-map-2-line text-orange-400"></i> {{ $package->starting_location }}
                            </span>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 flex flex-col gap-1">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Destination</span>
                            <span class="text-sm font-bold text-gray-800 flex items-center gap-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-map-pin-fill text-orange-400"></i> {{ $package->package_location }}
                            </span>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 flex flex-col gap-1">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Duration</span>
                            <span class="text-sm font-bold text-gray-800 flex items-center gap-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-time-line text-orange-400"></i> {{ $package->duration }}N / {{ $package->duration + 1 }}D
                            </span>
                        </div>

                        @if($package->transportation)
                        <div class="bg-gray-50 rounded-xl p-4 flex flex-col gap-1">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Transport</span>
                            <span class="text-sm font-bold text-gray-800 flex items-center gap-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-bus-line text-orange-400"></i> {{ $package->transportation }}
                            </span>
                        </div>
                        @endif

                        @if($package->accommodation)
                        <div class="bg-gray-50 rounded-xl p-4 flex flex-col gap-1">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Accommodation</span>
                            <span class="text-sm font-bold text-gray-800 flex items-center gap-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-hotel-line text-orange-400"></i> {{ $package->accommodation }}
                            </span>
                        </div>
                        @endif

                        @if($package->meals)
                        <div class="bg-gray-50 rounded-xl p-4 flex flex-col gap-1">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Meals</span>
                            <span class="text-sm font-bold text-gray-800 flex items-center gap-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-restaurant-line text-orange-400"></i> {{ $package->meals }}
                            </span>
                        </div>
                        @endif

                    </div>
                </div>

                {{-- Itinerary --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-xl font-bold text-blue-900 mb-5 flex items-center gap-2"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-calendar-event-line text-orange-500"></i> Itinerary
                    </h2>
                    <div class="itinerary-body text-gray-700 text-sm leading-relaxed">
                        {!! $package->package_description !!}
                    </div>
                </div>

                {{-- Significance --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-heart-line text-orange-500"></i> Why Visit {{ $package->package_location }}
                    </h2>
                    <div class="space-y-3 text-sm text-gray-600 leading-relaxed" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <p>{{ $package->package_location }} holds immense cultural, spiritual, and natural significance in Nepal. Known for breathtaking landscapes, it attracts travellers from around the world seeking adventure and peace.</p>
                        <p>With ancient temples, monasteries, and historical landmarks, this destination offers a glimpse into Nepal's rich heritage and spiritual depth — more than sightseeing, it's a deep immersion into the soul of Nepal.</p>
                        <p>From warm hospitality to sacred sites, it's a journey perfect for adventurers, pilgrims, and peace-seekers alike.</p>
                    </div>
                </div>

            </div>

            {{-- RIGHT: Sticky Booking Card --}}
            <div class="lg:w-1/3">
                <div class="sticky top-28 space-y-5">

                    {{-- Price Card --}}
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                        {{-- Price --}}
                        <div class="mb-5">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wide" style="font-family: 'Plus Jakarta Sans', sans-serif;">Price per person</span>
                            <p class="text-3xl font-extrabold text-blue-900 mt-1"
                                style="font-family: 'DM Serif Display', Georgia, serif;">
                                Rs.{{ number_format($package->package_price) }}
                                <span class="text-sm font-normal text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">/ night</span>
                            </p>
                        </div>

                        {{-- Includes summary --}}
                        <div class="flex flex-wrap gap-2 mb-5">
                            @if($package->meals)
                                <span class="flex items-center gap-1 bg-orange-50 text-orange-700 text-xs font-semibold px-3 py-1.5 rounded-full border border-orange-100"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    <i class="ri-restaurant-line"></i> Meals
                                </span>
                            @endif
                            @if($package->accommodation)
                                <span class="flex items-center gap-1 bg-blue-50 text-blue-700 text-xs font-semibold px-3 py-1.5 rounded-full border border-blue-100"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    <i class="ri-hotel-line"></i> Stay
                                </span>
                            @endif
                            @if($package->transportation)
                                <span class="flex items-center gap-1 bg-green-50 text-green-700 text-xs font-semibold px-3 py-1.5 rounded-full border border-green-100"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    <i class="ri-bus-line"></i> Transport
                                </span>
                            @endif
                        </div>

                        <div class="border-t border-gray-100 pt-5 space-y-3">
                            <a href="{{ route('packages.show', $package->id) }}"
                                class="w-full flex items-center justify-center gap-2 bg-orange-500 hover:bg-orange-400 text-white font-bold text-sm py-3 rounded-full transition-all duration-200 hover:scale-105 shadow-sm"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-shopping-cart-line"></i> Book Now
                            </a>
                            <a href="{{ route('maps.show') }}"
                                class="w-full flex items-center justify-center gap-2 bg-blue-900 hover:bg-blue-800 text-white font-bold text-sm py-3 rounded-full transition-all duration-200 hover:scale-105"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-map-pin-line"></i> View on Map
                            </a>
                            <a href="{{ route('traveltips') }}"
                                class="w-full flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-sm py-3 rounded-full transition-all duration-200"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-lightbulb-line text-orange-500"></i> Travel Tips
                            </a>
                        </div>
                    </div>

                    {{-- Contact Card --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-base font-bold text-blue-900 mb-1 flex items-center gap-2"
                            style="font-family: 'DM Serif Display', Georgia, serif;">
                            <i class="ri-customer-service-2-line text-orange-500"></i> Need Help?
                        </h3>
                        <p class="text-xs text-gray-500 mb-4 leading-relaxed" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            Have questions about this package? Reach out to us directly.
                        </p>
                        <div class="flex items-center gap-4">
                            <a href="https://facebook.com/prabesh.ach"
                                class="w-9 h-9 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 hover:bg-blue-100 transition-colors">
                                <i class="ri-facebook-line text-lg"></i>
                            </a>
                            <a href="https://twitter.com/PrabeshAch33319"
                                class="w-9 h-9 rounded-full bg-sky-50 flex items-center justify-center text-sky-400 hover:bg-sky-100 transition-colors">
                                <i class="ri-twitter-line text-lg"></i>
                            </a>
                            <a href="https://instagram.com/prabesh_ach"
                                class="w-9 h-9 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 hover:bg-pink-100 transition-colors">
                                <i class="ri-instagram-line text-lg"></i>
                            </a>
                            <a href="mailto:prabesh11100@gmail.com"
                                class="w-9 h-9 rounded-full bg-gray-50 flex items-center justify-center text-gray-600 hover:bg-gray-100 transition-colors">
                                <i class="ri-mail-line text-lg"></i>
                            </a>
                            <a href="tel:+9779812965110"
                                class="w-9 h-9 rounded-full bg-green-50 flex items-center justify-center text-green-500 hover:bg-green-100 transition-colors">
                                <i class="ri-phone-line text-lg"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .itinerary-body h3 {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 1.05rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-top: 1.25rem;
        margin-bottom: 0.4rem;
    }
    .itinerary-body p {
        margin: 0.3rem 0;
        line-height: 1.7;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.875rem;
        color: #4b5563;
    }
    .itinerary-body strong {
        color: #f97316;
        font-weight: 600;
    }
    .itinerary-body ul {
        list-style: disc;
        padding-left: 1.25rem;
        margin: 0.5rem 0;
    }
    .itinerary-body ul li {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.875rem;
        color: #4b5563;
        margin-bottom: 0.25rem;
    }
</style>

@endsection
