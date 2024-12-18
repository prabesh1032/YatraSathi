@extends('layouts.master')

@section('content')
<!-- Header Section with Parallax Effect -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('pokhara.jpg') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-500 drop-shadow-lg animate-bounce">About Us</h1>
        <p class="text-lg md:text-xl mt-4 font-semibold ">Explore our vision and the journey behind YatraSathi</p>
        <a href="#mission" class="mt-6 px-8 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg transform hover:scale-105">LEARN MORE</a>
    </div>
</header>

<!-- Main Content -->
<div class="container mx-auto py-16 px-6">

    <!-- About YatraSathi -->
<section id="about-yatrasathi" class="relative text-center mb-16 bg-gradient-to-r from-lime-200 to-lime-400 text-white py-16">
    <div class="absolute inset-0 bg-cover bg-center opacity-15 " style="background-image: url('{{ asset('contact-bg.jpg') }}');"></div>
    <h2 class="text-4xl font-bold mb-6 animate__animated animate__fadeIn text-black">About YatraSathi</h2>
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


    <!-- Why Choose Us -->
    <section id="why-choose-us" class="py-16 px-6 bg-gray-50 text-gray-800 rounded-lg mb-16 shadow-lg">
    <h2 class="text-4xl font-bold mb-6 text-indigo-700 text-center animate__animated animate__fadeIn">Why Choose Us?</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <!-- Expert Guides Section -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('expertguides.jpg') }}" alt="Expert Guides" class="w-24 h-24 rounded-full border-4 border-yellow-500 shadow-lg transform hover:scale-110 transition-all duration-300">
            </div>
            <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Expert Guides</h3>
            <p class="text-gray-600">Our team of local guides are experts in their fields, ensuring you have an insightful and authentic travel experience wherever you go.</p>
        </div>
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <!-- Tailored Experiences Section -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('t.jpg') }}" alt="Tailored Experiences" class="w-24 h-24 rounded-full border-4 border-yellow-500 shadow-lg transform hover:scale-110 transition-all duration-300">
            </div>
            <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Tailored Experiences</h3>
            <p class="text-gray-600">We provide customizable itineraries that suit your interests and travel style. Adventure, relaxation, culture – we cater to all.</p>
        </div>
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <!-- Sustainable Travel Section -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('sustainable.jpg') }}" alt="Sustainable Travel" class="w-24 h-24 rounded-full border-4 border-yellow-500 shadow-lg transform hover:scale-110 transition-all duration-300">
            </div>
            <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Sustainable Travel</h3>
            <p class="text-gray-600">We believe in responsible tourism that helps protect the environment and benefits local communities. Join us in creating a positive impact.</p>
        </div>
    </div>
</section>


    <!-- Contact Us -->
    <section id="contact-us" class="py-16 px-6 bg-white text-gray-900 flex flex-col justify-center items-center text-center">
        <h2 class="text-3xl font-bold mb-6 text-yellow-500 animate__animated animate__fadeIn">Get in Touch</h2>
        <p class="text-lg mb-6 animate__animated animate__fadeIn animate__delay-1s">Have questions or ready to book your next adventure? Reach out to us, and we will help you plan the trip of a lifetime!</p>
        <a href="{{ route('contact') }}" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 animate__animated animate__fadeIn animate__delay-2s">CONTACT US</a>
    </section>

</div>

@endsection
