@extends('layouts.master')

@section('content')
<!-- Header Section with Parallax Effect -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('contact-bg.jpg') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-500 drop-shadow-lg animate__animated animate__fadeIn animate-bounce">Get In Touch</h1>
        <p class="text-md md:text-xl mt-4 animate__animated animate__fadeIn animate__delay-1s">We'd love to hear from you</p>
        <a href="#contact-form" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 animate__animated animate__fadeIn animate__delay-2s">CONTACT US</a>
    </div>
</header>

<!-- Main Content -->
<div class="mt-20" id="contact-form">
    <h2 class="text-4xl font-bold mb-6 text-center text-indigo-700">Contact Us</h2>
    <p class="text-lg text-center mb-10 text-gray-600">Whether you're planning an adventure, need more information, or want to customize your experience, we're here to assist you!</p>

    <!-- Contact Information Section -->

    <div class="container mx-auto mb-12 text-center">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Email Section -->
            <div class="p-6 rounded-lg shadow-lg hover:shadow-2xl transition-all bg-gradient-to-r from-yellow-100 to-lime-200">
                <h3 class="text-2xl font-semibold text-black mb-4 text-center">Email</h3>
                <p class="text-lg text-gray-600 mb-4 text-center">For all inquiries, feel free to email us at:</p>
                <div class="flex justify-center items-center">
                    <a href="mailto:yatrasathi@gmail.com" class="flex items-center text-indigo-700 font-semibold hover:text-indigo-800">
                        <i class="ri-mail-line mr-3 text-2xl"></i>yatrasathi@gmail.com
                    </a>
                </div>
            </div>
            <!-- Phone Section -->
            <div class="p-6 rounded-lg shadow-lg hover:shadow-2xl transition-all bg-gradient-to-r from-lime-200 to-yellow-100">
                <h3 class="text-2xl font-semibold text-black mb-4 text-center">Phone</h3>
                <p class="text-lg text-gray-600 mb-4 text-center">Call us anytime to talk about your next journey:</p>
                <div class="flex justify-center items-center">
                    <a href="tel:+9812965110" class="flex items-center text-indigo-700 font-semibold hover:text-indigo-800">
                        <i class="ri-phone-line mr-3 text-2xl"></i>+9812965110
                    </a>
                </div>
            </div>
            <!-- Social Media Section -->
            <div class="p-6 rounded-lg shadow-lg hover:shadow-2xl transition-all bg-gradient-to-r from-yellow-100 to-lime-200">
                <h3 class="text-2xl font-semibold text-black mb-4 text-center">Follow Us</h3>
                <p class="text-lg text-gray-600 mb-4 text-center">Stay connected with us on social media for updates, tips, and special offers:</p>
                <div class="flex justify-center gap-6">
                    <a href="https://facebook.com/yatrasathi" class="text-indigo-700 hover:text-indigo-800">
                        <i class="ri-facebook-line ri-2x"></i>
                    </a>
                    <a href="https://instagram.com/yatrasathi" class="text-indigo-700 hover:text-indigo-800">
                        <i class="ri-instagram-line ri-2x"></i>
                    </a>
                    <a href="https://twitter.com/yatrasathi" class="text-indigo-700 hover:text-indigo-800">
                        <i class="ri-twitter-line ri-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="container mx-auto">
    <!-- Form Header -->
    <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-800">Reach Out to Us - We are Here for You!</h2>
    <p class="text-lg text-center mb-8 text-gray-600">Got questions or need assistance? Drop us a message, and we'll connect with you in no time!</p>

    <!-- Contact Form -->
    <form action="{{ route('contact.store') }}" method="POST" class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        @csrf
            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <!-- Message Input -->
            <div class="mb-4">
                <label for="message" class="block text-lg font-medium mb-2">Message</label>
                <textarea id="message" name="message" class="w-full px-4 py-2 border border-gray-300 rounded-lg h-32" required></textarea>
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600">SEND MESSAGE</button>
            </div>
        </form>
    </div>
</div>
@endsection
