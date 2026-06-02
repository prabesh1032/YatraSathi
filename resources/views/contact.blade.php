@extends('layouts.master')

@section('content')
<header class="relative w-full bg-cover bg-center overflow-hidden"
        style="height: 280px; background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
        <div class="absolute inset-0"
            style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);">
        </div>
        <div class="relative h-full flex flex-col justify-center items-center text-center px-4">
            <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                ✦ YatraSathi
            </span>
            <h1 class="text-white font-semibold leading-tight mb-3"
                style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
                Get in Touch
            </h1>
            <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
                style="font-family: 'Plus Jakarta Sans', sans-serif;">
  Get in touch and start your next adventure.
            </p>
        </div>
    </header>

<!-- Main Content -->
<div class="mt-20" id="contact-form">
    <p class="text-lg font-bold text-center mb-10 text-gray-600"style="font-family: 'Plus Jakarta Sans', sans-serif;">Whether you're planning an adventure, need more information, or want to customize your experience, we're here to assist you!</p>

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
    <div class="container mx-auto mb-8">
        <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-800">Reach Out to Us - <span class="text-yellow-500">We Are Here for You!</span></h2>
        <p class="text-lg text-center mb-8 text-gray-600">Got questions or need assistance? Drop us a message, and we'll connect with you in no time!</p>

        <form action="{{ route('messages.store') }}" method="POST" class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 border-t-4 border-yellow-500">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-bold mb-2">Name</label>
                @auth
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" value="{{ auth()->user()->name }}" required>
                @else
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Your Name" required>
                @endauth
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg font-bold mb-2">Email</label>
                @auth
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" value="{{ auth()->user()->email }}" required>
                @else
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Your Email" required>
                @endauth
            </div>

            <div class="mb-4">
                <label for="message" class="block text-lg font-bold mb-2">Message</label>
                <textarea id="message" name="message" class="w-full px-4 py-2 border border-gray-300 rounded-lg h-32 focus:ring-2 focus:ring-yellow-500" placeholder="Your Message" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-300 transition-colors duration-300">
                    SEND MESSAGE
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
