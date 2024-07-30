@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row lg:gap-10">
        <div class="lg:w-2/3">
            <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-88 rounded-lg shadow-lg object-cover mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $package->name }}</h1>
            <p class="text-gray-700 mb-8">{{ $package->description }}</p>
        </div>
        <div class="lg:w-1/3 lg:h-auto border border-gray-100">
            <div class="sticky top-20 bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">USD {{ $package->price }}</h2>
                <p class="text-gray-600 mb-6"><i class="ri-time-line"></i> {{ $package->duration }} Nights {{ $package->duration + 1 }} Days</p>
                <a href="{{ route('packages.show', $package->id) }}" class="bg-blue-600 text-white text-center py-2 px-4 rounded-lg shadow-md block mb-4">Book Now</a>
                <a href="#" class="bg-gray-100 text-blue-600 text-center py-2 px-4 rounded-lg shadow-md block mb-4">Customize this trip</a>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Ask an Expert</h3>
                <p class="text-gray-600"><i class="ri-mail-line"></i> <a href="mailto:yatrasathi@gmail.com">yatrasathi@gmail.com</a></p>
                <p class="text-gray-600"><i class="ri-phone-line"></i> <a href="tel:9812965110">9812965110</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
