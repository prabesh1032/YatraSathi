@extends('layouts.master')

@section('title', 'Guides')
@section('content')
<div class="container  mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="text-center mb-12">
        <h1 class="text-6xl font-extrabold z-10 text-gray-900 mb-4">Our Expert <span class="text-yellow-500">Guides</span></h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
        @foreach($guides as $guide)
        <div class="relative bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-1">
            <div class="p-6">
                <div class="relative w-32 h-32 mx-auto mb-6">
                    @if($guide->photopath)
                    <img src="{{ asset('images/' . $guide->photopath) }}"
                         alt="Portrait of {{ $guide->name }}"
                         class="w-full h-full object-cover rounded-full border-4 border-white shadow-md"
                         loading="lazy"
                         @if($guide->photopath_credit) title="Photo credit: {{ $guide->photopath_credit }}" @endif>

                    @endif
                </div>

                <div class="text-center space-y-4">
                    <h2 class="text-xl font-bold text-gray-900 leading-tight">
                        {{ $guide->name }}
                    </h2>

                    <div class="flex flex-col space-y-2 text-sm text-gray-600">
                        @if($guide->package)
                        <div class="flex font-extrabold items-center justify-center">
                            <i class="ri-map-pin-2-line text-green-600 mr-2" aria-hidden="true"></i>
                            <span class="text-black">Specializes in-</span><span class="text-yellow-500"> {{ $guide->package->name }}</span>

                        </div>
                        @endif

                        <div class="flex items-center font-extrabold justify-center">
                            <i class="ri-award-line text-yellow-600 mr-2" aria-hidden="true"></i>
                            <span>{{ $guide->experience }}+ years experience</span>
                        </div>

                        @if($guide->languages)
                        <div class="flex items-center justify-center">
                            <i class="ri-global-line text-blue-600 mr-2" aria-hidden="true"></i>
                            <span>Speaks {{ implode(', ', $guide->languages) }}</span>
                        </div>
                        @endif
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ Str::limit($guide->bio, 120, '...') }}
                    </p>

                    <div class="pt-4">
                        <a href="{{ route('guides.show', $guide->id) }}"
                           class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                           aria-label="View profile of {{ $guide->name }}">
                            View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
