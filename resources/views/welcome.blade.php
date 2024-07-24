@extends('layouts.master')

@section('content')
<!-- Header -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Nnx8fGVufDB8fHx8fA%3D%3D');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-4xl md:text-6xl font-bold">Discover Your Next Adventure</h1>
        <p class="text-md md:text-xl mt-4">Explore the world with our curated travel experiences</p>
        <a href="#" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600">LEARN MORE</a>
    </div>
</header>

<!-- Main Content -->
<div class="mt-20">
    <h2 class="text-3xl font-bold mb-6 text-center">Welcome to YatraSathi</h2>
    <p class="text-lg text-center">Your trusted travel companion for unforgettable journeys.</p>
</div>
@endsection
