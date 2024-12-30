@extends('layouts.master')

@section('content')
<!-- Header Section with Parallax Effect -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-gray-100">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-400 drop-shadow-lg animate-bounce">
            About Us
        </h1>
        <p class="text-xl md:text-2xl mb-1 font-extrabold">
            Discover the story and passion behind YatraSathi.
        </p>
        <a href="#mission" class="mt-6 px-8 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 shadow-lg transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp animate__delay-1.5s">
            Learn More <i class="ri-arrow-down-circle-line ml-2"></i>
        </a>
    </div>
</header>

<div class="container mx-auto py-16 px-6">
    <!-- About YatraSathi -->
    <section id="about" class="relative text-center mb-16 bg-gradient-to-r from-lime-200 to-lime-400 text-white py-16 rounded-lg shadow-xl">
        <div class="absolute inset-0 bg-cover bg-center opacity-15" style="background-image: url('{{ asset('contact-bg.jpg') }}');"></div>
        <h2 class="text-4xl font-extrabold mb-6 text-black">
            About YatraSathi
        </h2>
        <p class="text-lg text-black max-w-3xl mx-auto font-bold">
            YatraSathi is more than just a travel agency; it's a movement that makes travel simpler, more adventurous, and deeply meaningful. We curate bespoke travel experiences that allow you to connect with the places you visit in ways that resonate long after you return home.
        </p>
    </section>

    <!-- Our Mission -->
    <section id="mission" class="bg-white text-gray-900 py-16 px-6 rounded-lg mb-16 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-t from-yellow-300 to-transparent opacity-30"></div>
        <h2 class="text-3xl font-extrabold mb-6 text-yellow-500 text-center animate__animated animate__fadeIn">
            Our Mission <i class="ri-earth-line text-indigo-500 ml-2"></i>
        </h2>
        <p class="text-lg max-w-3xl mx-auto text-center font-bold">
        Our mission is to bring the world closer through travel. By offering a wide range of curated experiences, we aim to create a sense of discovery and connection that transcends ordinary travel. We believe in sustainable tourism, authentic experiences, and creating memories that will last a lifetime.        </p>
    </section>
     <!-- Why Choose Us Section -->
     <section id="why-choose-us" class="py-16 bg-gradient-to-b from-white to-indigo-50">
    <div class="container mx-auto px-6 lg:px-16">

        <!-- Section Title -->
        <div class="text-center mb-12">
            <h2 class="text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">Why Choose <span class="text-indigo-500">YatraSathi?</span></h2>
            <p class="text-lg text-gray-600">We go beyond expectations to turn your travel dreams into reality.</p>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- First Feature -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('expertguides.jpg') }}" alt="Affordable Travel" class="w-20 h-20 mx-auto rounded-full mb-4 border-2 border-yellow-400">
                <i class="ri-wallet-line text-yellow-500 text-5xl mb-4"></i>
                <h3 class="text-2xl font-semibold text-indigo-500 mb-3">Affordable Travel</h3>
                <p class="text-gray-600">We provide budget-friendly options without compromising on quality and comfort.</p>
            </div>


            <!-- Second Feature -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('t.jpg') }}" alt="Tailored Experiences" class="w-20 h-20 mx-auto rounded-full mb-4 border-2 border-yellow-400">
                <i class="ri-lightbulb-flash-line text-yellow-500 text-5xl mb-4"></i>
                <h3 class="text-2xl font-semibold text-indigo-500 mb-3">Tailored Experiences</h3>
                <p class="text-gray-600">We customize travel itineraries to match your preferences, ensuring a personalized adventure.</p>
            </div>

            <!-- Third Feature -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('sustainable.jpg') }}" alt="Sustainable Travel" class="w-20 h-20 mx-auto rounded-full mb-4 border-2 border-yellow-400">
                <i class="ri-recycle-line text-yellow-500 text-5xl mb-4"></i>
                <h3 class="text-2xl font-semibold text-indigo-500 mb-3">Sustainable Travel</h3>
                <p class="text-gray-600">Our sustainable practices help preserve the environment while supporting local communities.</p>
            </div>

        </div>

        <!-- Call to Action -->
        <div class="mt-8 flex justify-center">
            <a href="{{ route('whyToChooseUs') }}" class="px-6 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 shadow-lg transition-transform duration-300 transform hover:scale-105">
                Read More <i class="ri-arrow-right-line ml-2"></i>
            </a>
        </div>
    </div>
</section>

    <!-- Contact Us Section -->
    <section id="contact-us" class="py-16 bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-yellow-500 mb-6 animate__animated animate__fadeInDown">
                Get in Touch <i class="ri-mail-send-line text-yellow-500 ml-2"></i>
            </h2>
            <p class="text-lg max-w-2xl mx-auto text-gray-700 mb-6 leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                Have questions or ready to plan your next adventure? Contact us today, and let’s make your dream journey a reality!
            </p>
            <a href="{{ route('contact') }}" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 shadow-lg transition-transform duration-300 transform hover:scale-105">
                Contact Us <i class="ri-arrow-right-line ml-2"></i>
            </a>
        </div>
    </section>
</div>
@endsection
