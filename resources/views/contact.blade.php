@extends('layouts.master')

@section('content')
<!-- Header Section with Parallax Effect -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('travelling7.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-gray-100">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-500 drop-shadow-lg animate__animated animate__fadeIn animate-bounce">Get In Touch</h1>
        <p class="text-md md:text-xl mt-4 font-extrabold">We'd love to hear from you</p>
        <a href="#contact-form" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 animate__animated animate__fadeIn animate__delay-2s">CONTACT US</a>
    </div>
</header>

<!-- Main Content -->
<div class="mt-20" id="contact-form">
    <h2 class="text-4xl font-extrabold mb-6 text-center text-indigo-700">Contact Us</h2>
    <p class="text-lg text-center mb-10 text-gray-600">Whether you're planning an adventure, need more information, or want to customize your experience, we're here to assist you!</p>

    <!-- Contact Information Section -->
    <div class="container mx-auto mb-12 text-center">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Email Section -->
            <div class="p-6 rounded-lg shadow-lg bg-gradient-to-r from-yellow-50 to-yellow-100 hover:shadow-2xl transition-all duration-300 group">
                <div class="flex flex-col items-center">
                    <div class="p-4 bg-yellow-500 text-white rounded-full mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-mail-line text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Email</h3>
                    <p class="text-lg text-gray-600 mb-4">Feel free to email us at:</p>
                    <a href="mailto:yatrasathi@gmail.com" class="text-indigo-700 font-semibold hover:text-indigo-900 transition-colors duration-300">
                        yatrasathi@gmail.com
                    </a>
                </div>
            </div>

            <!-- Phone Section -->
            <div class="p-6 rounded-lg shadow-lg bg-gradient-to-r from-yellow-50 to-yellow-100 hover:shadow-2xl transition-all duration-300 group">
                <div class="flex flex-col items-center">
                    <div class="p-4 bg-yellow-500 text-white rounded-full mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-phone-line text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Phone</h3>
                    <p class="text-lg text-gray-600 mb-4">Call us anytime at:</p>
                    <a href="tel:+9812965110" class="text-indigo-700 font-semibold hover:text-indigo-900 transition-colors duration-300">
                        +9812965110
                    </a>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="p-6 rounded-lg shadow-lg bg-gradient-to-r from-yellow-50 to-yellow-100 hover:shadow-2xl transition-all duration-300 group">
                <div class="flex flex-col items-center">
                    <div class="p-4 bg-yellow-500 text-white rounded-full mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-share-line text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Follow Us</h3>
                    <p class="text-lg text-gray-600 mb-4">Stay connected on social media:</p>
                    <div class="flex justify-center gap-6">
                        <a href="https://facebook.com/yatrasathi" class="text-indigo-700 hover:text-indigo-900 transition-transform duration-300 hover:scale-110">
                            <i class="ri-facebook-line ri-2x"></i>
                        </a>
                        <a href="https://instagram.com/yatrasathi" class="text-indigo-700 hover:text-indigo-900 transition-transform duration-300 hover:scale-110">
                            <i class="ri-instagram-line ri-2x"></i>
                        </a>
                        <a href="https://twitter.com/yatrasathi" class="text-indigo-700 hover:text-indigo-900 transition-transform duration-300 hover:scale-110">
                            <i class="ri-twitter-line ri-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="container mx-auto">
        <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-800">Reach Out to Us - <span class="text-yellow-500">We Are Here for You!</span></h2>
        <p class="text-lg text-center mb-8 text-gray-600">Got questions or need assistance? Drop us a message, and we'll connect with you in no time!</p>

        <form action="{{ route('messages.store') }}" method="POST" class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 border-t-4 border-yellow-500">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Your Name" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Your Email" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-lg font-medium mb-2">Message</label>
                <textarea id="message" name="message" class="w-full px-4 py-2 border border-gray-300 rounded-lg h-32 focus:ring-2 focus:ring-yellow-500" placeholder="Your Message" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 transition-colors duration-300">
                    SEND MESSAGE
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
