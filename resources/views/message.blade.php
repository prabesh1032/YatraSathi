@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold text-center mb-8">Messages</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($messages as $index => $message)
        <div class="bg-gradient-to-r from-green-300 via-blue-300 to-purple-300 p-6 rounded-lg shadow-md">
            <div class="text-lg font-semibold mb-2">#{{ $index + 1 }}: {{ $message->name }}</div>
            <p class="text-gray-700"><span class="font-bold">Email:</span> {{ $message->email }}</p>
            <p class="text-gray-700 mt-2"><span class="font-bold">Message:</span> {{ $message->message }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
