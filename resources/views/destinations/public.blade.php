@extends('layouts.master')

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
            Explore <em class="not-italic text-orange-400">Destinations</em>
        </h1>
        <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Discover amazing places around Nepal with YatraSathi
        </p>
    </div>
</header>

{{-- Destinations Grid --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">

        <div class="flex items-center justify-between mb-8">
    <p class="text-blue-900 font-bold text-lg" style="font-family: 'DM Serif Display', Georgia, serif;">
        {{ $destinations->count() }} Destinations
        <span class="text-orange-500">in Nepal</span>
    </p>
    <span class="text-xs text-gray-400 flex items-center gap-1" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        <i class="ri-map-pin-line text-orange-400"></i> All Regions
    </span>
</div>
        @if($destinations->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($destinations as $destination)
                    <a href="{{ route('destinations.show', $destination->id) }}"
                        class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">

                        {{-- Image --}}
                        <div class="relative h-60 overflow-hidden">
                            @if($destination->photopath)
                                <img src="{{ asset('images/' . $destination->photopath) }}"
                                    alt="{{ $destination->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-800 to-blue-500 flex items-center justify-center">
                                    <i class="ri-landscape-line text-white text-6xl opacity-60"></i>
                                </div>
                            @endif

                            {{-- Dark gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/75 via-blue-950/10 to-transparent"></div>

                            {{-- Package count badge --}}
                            <div class="absolute top-3 right-3">
                                <span class="bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                    {{ $destination->packages->count() }}
                                    {{ $destination->packages->count() == 1 ? 'Package' : 'Packages' }}
                                </span>
                            </div>

                            {{-- Name + description pinned to bottom --}}
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h3 class="text-white font-bold text-lg leading-snug"
                                    style="font-family: 'DM Serif Display', Georgia, serif;">
                                    {{ $destination->name }}
                                </h3>
                                @if($destination->description)
                                    <p class="text-blue-100 text-xs mt-1 line-clamp-2 leading-relaxed max-h-0 overflow-hidden group-hover:max-h-10 transition-all duration-300"
                                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                        {{ Str::limit($destination->description, 90) }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        {{-- Card Footer --}}
                        <div class="px-4 py-3 flex items-center justify-between border-t border-gray-100">
                            <div class="flex items-center gap-1.5 text-gray-400 text-xs"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                <i class="ri-map-pin-line text-orange-400 text-sm"></i>
                                <span>Nepal</span>
                            </div>
                            <span class="text-blue-800 text-xs font-bold flex items-center gap-1 group-hover:gap-2 transition-all duration-200"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Explore <i class="ri-arrow-right-line"></i>
                            </span>
                        </div>

                    </a>
                @endforeach
            </div>

        @else
            {{-- Empty State --}}
            <div class="text-center py-20">
                <i class="ri-map-pin-line text-6xl text-gray-200 mb-4 block"></i>
                <h3 class="text-xl font-semibold text-gray-500 mb-2"
                    style="font-family: 'DM Serif Display', Georgia, serif;">
                    No destinations available
                </h3>
                <p class="text-gray-400 text-sm mb-6"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    We're working on adding amazing destinations for you to explore.
                </p>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Back to Home <i class="ri-arrow-left-line"></i>
                </a>
            </div>
        @endif

    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-blue-900">
    <div class="container mx-auto px-6 text-center">
        <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            ✦ Ready to Travel?
        </span>
        <h2 class="text-white font-semibold mb-4"
            style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.6rem, 3vw, 2.2rem);">
            Ready for Your Next <em class="not-italic text-orange-400">Adventure?</em>
        </h2>
        <p class="text-blue-200 text-sm max-w-xl mx-auto mb-8 leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Browse our packages or contact us to create a custom travel experience just for you.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('packages') }}"
                class="inline-flex items-center justify-center gap-2 bg-orange-500 hover:bg-orange-400 text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300 hover:scale-105"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                Browse Packages <i class="ri-map-line"></i>
            </a>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center justify-center gap-2 border-2 border-white/30 hover:border-white text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                <i class="ri-customer-service-line"></i> Contact Us
            </a>
        </div>
    </div>
</section>

@endsection
