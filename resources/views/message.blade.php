@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <!-- Title Section -->
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-indigo-700 drop-shadow-lg animate-fade-in-down">
            📩 Your Messages
        </h1>
        <p class="mt-3 text-gray-600 text-lg">
            Here you can view all received messages beautifully organized.
        </p>
    </div>

    <!-- Messages Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-10">
        @forelse ($messages as $index => $message)
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-transform transform hover:-translate-y-2 hover:scale-105 duration-300 relative">
                <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-400 to-indigo-500 text-white text-sm font-bold py-1 px-3 rounded-full shadow-md">
                    #{{ $index + 1 }}
                </div>
                <div class="p-6 space-y-4">
                    <h2 class="text-2xl font-bold text-indigo-800 truncate">
                        {{ $message->name }}
                    </h2>

                    <div class="flex items-center text-gray-600">
                        <i class="ri-mail-line text-indigo-500 mr-2 text-xl"></i>
                        <span class="font-semibold">Email:</span> {{ $message->email }}
                    </div>

                    <div class="text-gray-700 mt-4">
                        <p class="font-semibold mb-1 flex items-center">
                            <i class="ri-chat-3-line text-green-400 mr-2 text-xl"></i> Message:
                        </p>
                        <p class="bg-indigo-50 p-4 rounded-lg shadow-inner text-sm">
                            {{ $message->message }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full flex flex-col items-center justify-center py-20">
                <div class="bg-indigo-100 p-10 rounded-full mb-6 animate-pulse">
                    <i class="ri-inbox-line text-6xl text-indigo-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-4">No Messages Found</h3>
                <p class="text-gray-500 text-center max-w-md">
                    You haven't received any messages yet.
                </p>
            </div>
        @endforelse
    </div>
</div>
@endsection
