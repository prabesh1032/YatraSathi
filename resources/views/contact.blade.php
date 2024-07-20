@extends('layouts.master')

@section('content')
<!-- Header -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-4xl md:text-6xl font-bold">Get In Touch</h1>
        <p class="text-md md:text-xl mt-4">We'd love to hear from you</p>
        <a href="#" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600">CONTACT US</a>
    </div>
</header>

<!-- Main Content -->
<div class="mt-20">
    <h2 class="text-3xl font-bold mb-6 text-center">Contact Us</h2>
    <p class="text-lg text-center mb-10">Feel free to reach out to us with any questions or inquiries.</p>
    <div class="container mx-auto">
        <form action="{{ route('contact') }}" method="POST" class="max-w-xl mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-lg font-medium mb-2">Message</label>
                <textarea id="message" name="message" class="w-full px-4 py-2 border border-gray-300 rounded-lg h-32" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600">SEND MESSAGE</button>
            </div>
        </form>
    </div>
</div>
@endsection
