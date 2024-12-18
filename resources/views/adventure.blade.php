@extends('layouts.master')

@section('content')
<!-- Adventure Activities Section -->
<section class="bg-gradient-to-r from-white to-indigo-50 py-16 text-gray-900">
    <div class="container mx-auto text-center">
        <!-- Section Title -->
        <h1 class="text-5xl font-extrabold mb-6 text-gray-900 uppercase tracking-wide drop-shadow-md">Adventure <span class="text-yellow-500">Awaits!</h1>
        <p class="text-xl text-gray-700 mb-12 max-w-4xl mx-auto leading-relaxed">
            Get ready for the adventure of a lifetime! Whether you're trekking through mountains, diving into crystal-clear waters, or exploring the wild on a safari, your next unforgettable experience starts here.
        </p>

        <!-- Adventure Activities Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Activity Card Template -->
            @php
                $activities = [
                    ['image' => 'trekHimal.jpg', 'title' => 'Trekking in the Himalayas', 'desc' => 'Embark on an unforgettable journey through the majestic Himalayas.', 'btn' => 'Explore Trekking Packages'],
                    ['image' => 'Paragliding.jpg', 'title' => 'Paragliding', 'desc' => 'Soar above stunning landscapes and feel the rush of freedom as you glide through the air.', 'btn' => 'Explore Paragliding Packages'],
                    ['image' => 'safari.jpg', 'title' => 'Wildlife Safari', 'desc' => 'Get up close with nature and witness wildlife in its natural habitat.', 'btn' => 'Explore Safari Packages'],
                    ['image' => 'biking.jpg', 'title' => 'Mountain Biking', 'desc' => 'Ride through rugged terrains and beautiful trails on an adrenaline-packed adventure.', 'btn' => 'Explore Mountain Biking Packages'],
                    ['image' => 'rafting.jpg', 'title' => 'Rafting Adventures', 'desc' => 'Paddle through rapids and enjoy the excitement of white-water rafting.', 'btn' => 'Join a Rafting Expedition'],
                    ['image' => 'horseriding.jpg', 'title' => 'Horseback Riding', 'desc' => 'Explore scenic trails on horseback, enjoying the peacefulness of nature.', 'btn' => 'Book Your Riding Tour']
                ];
            @endphp

            @foreach ($activities as $activity)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-500 relative group">
                    <!-- Card Image -->
                    <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}"
                        class="w-full h-52 object-cover group-hover:brightness-75 transition-all duration-500">

                    <!-- Activity Badge -->
                    <span class="absolute top-4 left-4 bg-yellow-500 text-white text-xs font-bold uppercase px-3 py-1 rounded-full shadow-md">
                        Popular
                    </span>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-indigo-500 mb-3 group-hover:text-yellow-500 transition-colors duration-300">
                            {{ $activity['title'] }}
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            {{ $activity['desc'] }}
                        </p>
                        <a href="{{ route('packages') }}"
                            class="text-indigo-500 font-semibold hover:underline">
                            {{ $activity['btn'] }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="mt-12">
            <p class="text-2xl mb-6 text-gray-800 font-medium leading-snug">
                Ready to start your adventure? <span class="text-yellow-500 font-bold">Join us</span> for a thrilling journey and create memories that will last a lifetime.
            </p>
            <a href="{{ route('packages') }}"
                class="inline-block bg-yellow-500 text-gray-900 font-bold text-lg px-8 py-3 rounded-full shadow-md hover:bg-yellow-600 transition-all duration-300 transform hover:scale-105">
                View All Adventure Packages
            </a>
        </div>
    </div>
</section>
@endsection
