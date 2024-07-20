@extends('layouts.master')

@section('content')
<!-- Header -->
<header class="relative h-screen bg-cover bg-center" style="background-image: url('');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-4xl md:text-6xl font-bold">About Us</h1>
        <p class="text-md md:text-xl mt-4">Learn more about our mission and values</p>
        <a href="#" class="mt-6 px-5 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600">LEARN MORE</a>
    </div>
</header>

<!-- Main Content -->
<div class="mt-20">
    <h2 class="text-3xl font-bold mb-6 text-center">About YatraSathi</h2>
    <p class="text-lg text-center">We are dedicated to providing exceptional travel experiences for all our customers.</p>
</div>
@endsection
