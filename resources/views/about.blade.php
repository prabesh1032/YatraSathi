@extends('layouts.master')

@section('content')
<!-- Header Section -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('https://www.spendlifetraveling.com/wp-content/uploads/2022/05/how_to_travel_cheaply_in_the_usa_on_a_budget.jpg');">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-500 drop-shadow-lg">About Us</h1>
        <p class="text-lg md:text-xl mt-4 font-semibold">Explore our vision and the journey behind YatraSathi</p>
        <a href="#mission" class="mt-6 px-8 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg transform hover:scale-105">LEARN MORE</a>
    </div>
</header>

<!-- Main Content -->
<div class="container mx-auto py-16 px-6">
    <!-- About YatraSathi -->
    <section id="about-yatrasathi" class="text-center mb-16">
        <h2 class="text-4xl font-bold mb-6 text-indigo-700">About YatraSathi</h2>
        <p class="text-lg text-gray-700 max-w-3xl mx-auto">
            YatraSathi is more than just a travel agency; it's a movement that makes travel simpler, more adventurous, and deeply meaningful. We curate bespoke travel experiences that allow you to connect with the places you visit in ways that resonate long after you return home. Whether it's the Himalayas or hidden beaches, we open doors to destinations like never before.
        </p>
    </section>

    <!-- Our Mission -->
    <section id="mission" class="bg-white text-gray-900 py-12 px-6 rounded-lg mb-16 shadow-md">
        <h2 class="text-3xl font-bold mb-6 text-yellow-500 text-center">Our Mission</h2>
        <p class="text-lg max-w-3xl mx-auto text-center">
            Our mission is to bring the world closer through travel. By offering a wide range of curated experiences, we aim to create a sense of discovery and connection that transcends ordinary travel. We believe in sustainable tourism, authentic experiences, and creating memories that will last a lifetime.
        </p>
    </section>

    <!-- Why Choose Us -->
    <section id="why-choose-us" class="py-12 px-6 bg-gray-50 text-gray-800 rounded-lg mb-16 shadow-lg">
        <h2 class="text-4xl font-bold mb-6 text-indigo-700 text-center">Why Choose Us?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Expert Guides</h3>
                <p class="text-gray-600">Our team of local guides are experts in their fields, ensuring you have an insightful and authentic travel experience wherever you go.</p>
            </div>
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Tailored Experiences</h3>
                <p class="text-gray-600">We provide customizable itineraries that suit your interests and travel style. Adventure, relaxation, culture – we cater to all.</p>
            </div>
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Sustainable Travel</h3>
                <p class="text-gray-600">We believe in responsible tourism that helps protect the environment and benefits local communities. Join us in creating a positive impact.</p>
            </div>
        </div>
    </section>

    <!-- Customer Testimonials -->
    <section id="testimonials" class="py-12 px-6 bg-gray-50 text-gray-900 rounded-lg mb-16">
        <h2 class="text-3xl font-bold mb-6 text-yellow-500 text-center">What Our Customers Say</h2>
        <div class="flex flex-wrap justify-center gap-10">
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg max-w-md text-center">
                <p class="text-gray-600 italic mb-4">"YatraSathi made our trip to Nepal unforgettable. Their team was incredibly knowledgeable, and we felt like we were exploring hidden gems that we wouldn’t have found on our own!"</p>
                <p class="font-semibold text-indigo-700">Sarah & James</p>
                <p class="text-gray-500">New York, USA</p>
            </div>
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg max-w-md text-center">
                <p class="text-gray-600 italic mb-4">"The team at YatraSathi helped us plan the perfect trekking adventure in the Himalayas. The attention to detail was exceptional, and we felt completely safe throughout our journey."</p>
                <p class="font-semibold text-indigo-700">Anil & Priya</p>
                <p class="text-gray-500">Kathmandu, Nepal</p>
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section id="contact-us" class="py-12 px-6 bg-white text-gray-900">
        <h2 class="text-3xl font-bold mb-6 text-yellow-500 text-center">Get in Touch</h2>
        <p class="text-lg text-center mb-6">Have questions or ready to book your next adventure? Reach out to us, and we’ll help you plan the trip of a lifetime!</p>
        <div class="text-center">
            <a href="mailto:yatrasathi@gmail.com" class="text-yellow-500 font-semibold hover:text-yellow-600">Email: yatrasathi@gmail.com</a><br>
            <a href="tel:+9812965110" class="text-yellow-500 font-semibold hover:text-yellow-600">Call: +9812965110</a>
        </div>
    </section>
</div>

@endsection
