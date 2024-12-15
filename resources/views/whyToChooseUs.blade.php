@extends('layouts.master')

@section('content')
<section id="why-us" class="py-16 bg-white">
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
        <div class="col-span-1 lg:col-span-2">
            <h2 class="text-4xl font-extrabold text-indigo-700 mb-6">Why Travel With YatraSathi?</h2>
            <p class="text-lg text-gray-700 mb-6">We provide customized travel experiences tailored to your preferences, ensuring you enjoy the best of every destination.</p>
            <ul class="list-disc pl-6 text-gray-700 text-lg">
                <li>Exclusive travel deals and packages</li>
                <li>Personalized itinerary planning</li>
                <li>24/7 customer support</li>
                <li>Trusted by thousands of happy travelers</li>
            </ul>
        </div>
        <div class="col-span-1">
            <img src="{{ asset('pokhara.jpg') }}" alt="Why Choose Us" class="w-full rounded-lg shadow-lg">
        </div>
    </div>
</section>
@endsection
