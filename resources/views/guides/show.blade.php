@extends('layouts.master')

@section('title', 'Guides')

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
            Meet Our Expert <em class="not-italic text-orange-400">Guides</em>
        </h1>
        <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Certified guides who craft unforgettable adventures with their expertise.
        </p>
    </div>
</header>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filter + Count bar --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
            <p class="text-blue-900 font-bold text-lg" style="font-family: 'DM Serif Display', Georgia, serif;">
                {{ $guides->count() }} <span class="text-orange-500">Guides Available</span>
            </p>
            <form id="filterForm" method="GET" action="{{ route('guides.show') }}">
                <select class="px-4 py-2 text-sm rounded-full border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-white text-gray-700"
                    name="specialization" onchange="this.form.submit()"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    <option value="">All Specializations</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}"
                            @if($package->id == $selectedPackage) selected @endif>
                            {{ $package->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- Guides Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @forelse($guides as $guide)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden group">

                    {{-- Top color bar --}}
                    <div class="h-2 bg-gradient-to-r from-blue-900 to-orange-500"></div>

                    <div class="p-5">

                        {{-- Profile image + availability --}}
                        <div class="relative w-24 h-24 mx-auto mb-4">
                            @if($guide->photopath)
                                <img src="{{ asset('images/' . $guide->photopath) }}"
                                    alt="{{ $guide->name }}"
                                    class="w-full h-full object-cover rounded-full border-4 border-white shadow-md"
                                    loading="lazy">
                            @else
                                <div class="w-full h-full rounded-full bg-blue-50 flex items-center justify-center border-4 border-white shadow-md">
                                    <i class="ri-user-line text-blue-300 text-4xl"></i>
                                </div>
                            @endif
                            {{-- Availability dot --}}
                            <span class="absolute bottom-1 right-1 w-4 h-4 rounded-full border-2 border-white
                                {{ $guide->is_booked ? 'bg-red-500' : 'bg-green-500' }}">
                            </span>
                        </div>

                        {{-- Name + cert --}}
                        <div class="text-center mb-4">
                            <h2 class="text-blue-900 font-bold text-lg leading-snug"
                                style="font-family: 'DM Serif Display', Georgia, serif;">
                                {{ $guide->name }}
                            </h2>
                            <p class="text-xs text-gray-400 mt-0.5"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                {{ $guide->certifications ?? 'Certified Adventure Guide' }}
                            </p>
                            <span class="inline-block mt-2 text-xs font-bold px-3 py-1 rounded-full
                                {{ $guide->is_booked ? 'bg-red-50 text-red-500' : 'bg-green-50 text-green-600' }}"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                {{ $guide->is_booked ? 'Booked' : 'Available' }}
                            </span>
                        </div>

                        {{-- Stats --}}
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <div class="bg-blue-50 rounded-xl p-3 text-center">
                                <p class="text-xl font-extrabold text-blue-900"
                                    style="font-family: 'DM Serif Display', Georgia, serif;">
                                    {{ $guide->experience }}+
                                </p>
                                <span class="text-xs text-blue-400"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    Years Exp.
                                </span>
                            </div>
                            <div class="bg-orange-50 rounded-xl p-3 text-center">
                                <p class="text-xl font-extrabold text-orange-500"
                                    style="font-family: 'DM Serif Display', Georgia, serif;">
                                    {{ $guide->tours_count }}
                                </p>
                                <span class="text-xs text-orange-400"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    Tours Led
                                </span>
                            </div>
                        </div>

                        {{-- Specialization --}}
                        <div class="flex items-center justify-center gap-2 bg-gray-50 border border-gray-100 rounded-xl px-4 py-2.5 mb-4">
                            <i class="ri-map-pin-line text-orange-400 text-sm"></i>
                            <span class="text-xs text-gray-500"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Specializes in:
                            </span>
                            <span class="text-xs font-bold text-blue-900"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                {{ $guide->package->name }}
                            </span>
                        </div>

                        {{-- CTA --}}
                        <a href="{{ route('guides.profile', $guide->id) }}"
                            class="w-full inline-flex items-center justify-center gap-2 bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold px-4 py-2.5 rounded-full transition-all duration-200 hover:scale-105"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            View Full Profile <i class="ri-arrow-right-line"></i>
                        </a>

                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <i class="ri-user-search-line text-6xl text-gray-200 mb-4 block"></i>
                    <h3 class="text-xl font-semibold text-gray-500 mb-2"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        No Guides Available
                    </h3>
                    <p class="text-gray-400 text-sm"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        No guides available at the moment. Check back soon!
                    </p>
                </div>
            @endforelse
        </div>

    </div>
</section>

@endsection
