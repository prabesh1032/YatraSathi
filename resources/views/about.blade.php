@extends('layouts.master')

@section('content')
<!-- Header Section with Parallax Effect -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('pokhara.jpg') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50 "></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-400 drop-shadow-lg animate__animated animate__fadeInDown animate-bounce">
            About Us
        </h1>
        <p class="text-xl md:text-2xl mb-1 ">
            Discover the story and passion behind YatraSathi.
        </p>
        <a href="#mission" class="mt-6 px-8 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1.5s">
            Learn More
        </a>
    </div>
</header>
<div class="container mx-auto py-16 px-6">
    <!-- About YatraSathi -->
    <section id="mission" class="relative text-center mb-16 bg-gradient-to-r from-lime-200 to-lime-400 text-white py-16">
        <div class="absolute inset-0 bg-cover bg-center opacity-15" style="background-image: url('{{ asset('contact-bg.jpg') }}');"></div>
        <h2 class="text-4xl font-bold mb-6 text-black animate__animated animate__fadeIn">About YatraSathi</h2>
        <p class="text-lg text-black max-w-3xl mx-auto animate__animated animate__fadeIn animate__delay-1s">
            YatraSathi is more than just a travel agency; it's a movement that makes travel simpler, more adventurous, and deeply meaningful. We curate bespoke travel experiences that allow you to connect with the places you visit in ways that resonate long after you return home. Whether it's the Himalayas or hidden beaches, we open doors to destinations like never before.
        </p>
    </section>

    <!-- Our Mission -->
    <section id="mission" class="bg-white text-gray-900 py-16 px-6 rounded-lg mb-16 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-t from-yellow-300 to-transparent opacity-30"></div>
        <h2 class="text-3xl font-bold mb-6 text-yellow-500 text-center animate__animated animate__fadeIn">Our Mission</h2>
        <p class="text-lg max-w-3xl mx-auto text-center animate__animated animate__fadeIn animate__delay-1s">
            Our mission is to bring the world closer through travel. By offering a wide range of curated experiences, we aim to create a sense of discovery and connection that transcends ordinary travel. We believe in sustainable tourism, authentic experiences, and creating memories that will last a lifetime.
        </p>
    </section>

<!-- Why Choose Us Section -->
<section id="why-choose-us" class="py-16 bg-gray-50">
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold text-indigo-600 text-center mb-12 animate__animated animate__fadeInDown">
            Why Choose Us?
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('expertguides.jpg') }}" alt="Expert Guides" class="w-20 h-20 mx-auto rounded-full mb-4 border-2 border-yellow-400">
                <h3 class="text-2xl font-semibold text-yellow-500 mb-3">Expert Guides</h3>
                <p class="text-gray-600">Our experienced local guides ensure you have an authentic and enriching journey.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('t.jpg') }}" alt="Tailored Experiences" class="w-20 h-20 mx-auto rounded-full mb-4 border-2 border-yellow-400">
                <h3 class="text-2xl font-semibold text-yellow-500 mb-3">Tailored Experiences</h3>
                <p class="text-gray-600">We customize travel itineraries to match your preferences, ensuring a personalized adventure.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('sustainable.jpg') }}" alt="Sustainable Travel" class="w-20 h-20 mx-auto rounded-full mb-4 border-2 border-yellow-400">
                <h3 class="text-2xl font-semibold text-yellow-500 mb-3">Sustainable Travel</h3>
                <p class="text-gray-600">Our sustainable practices help preserve the environment while supporting local communities.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact-us" class="py-16 bg-gradient-to-r from-blue-100 via-white to-blue-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-yellow-500 mb-6 animate__animated animate__fadeInDown">
            Get in Touch
        </h2>
        <p class="text-lg max-w-2xl mx-auto text-gray-700 mb-6 leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
            Have questions or ready to plan your next adventure? Contact us today, and let’s make your dream journey a reality!
        </p>
        <a href="{{ route('contact') }}" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 shadow-lg transition-transform duration-300 transform hover:scale-105">
            Contact Us
        </a>
    </div>
</section>
@endsection
