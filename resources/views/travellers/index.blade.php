@extends('layouts.app')
@section('title') Users
@endsection

@section('content')

<div class="overflow-hidden shadow-xl rounded-lg mt-4">
    <!-- Table Header -->
    <div class="grid grid-cols-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-4 rounded-t-lg">
        <div class="text-center font-semibold">S.N</div>
        <div class="text-center font-semibold">User Name</div>
        <div class="text-center font-semibold">Actions</div>
    </div>

    <!-- Users List -->
    @foreach($users as $user)
    <div class="grid grid-cols-3 bg-gray-900 text-white p-4 rounded-lg mt-2 mb-2 hover:bg-gray-800 transition-all duration-300">
        <div class="text-center">{{ $loop->iteration }}</div>
        <div class="text-center">{{ $user->name }}</div>
        <div class="flex justify-center space-x-4">
            <a href="" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Edit</a>
            <a href="" class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition duration-200" onclick="return confirm('Are you sure you want to delete')">Delete</a>
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="mt-6 text-center">
        {{ $users->links('pagination::tailwind') }}
    </div>
</div>

@endsection
