@extends('layouts.app')
@section('title') Users
@endsection

@section('content')

<div class="grid grid-cols-3  bg-gray-800 text-white p-2 rounded-t-lg mt-4 ">
    <div class="p-2 ml-20">S.N</div>
    <div class="p-2 ml-20">Users Name</div>
    <div class="p-2 ml-20">Actions</div>
</div>
@foreach($users as $user)
<div class="grid grid-cols-3   bg-gray-900 text-white p-2 rounded-lg mt-2 mb-1">
    <div class="p-2 ml-20">{{ $loop->iteration }}</div>
    <div class="p-2 ml-20">{{ $user->name }}</div>
    <div class="p-2 flex justify-center space-x-2 mr-20">
        <a href="" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg">Edit</a>
        <a href="" class="bg-red-700 text-white px-3 py-1.5 rounded-lg" onclick="return confirm('Are you sure you want to delete')">Delete</a>
    </div>
</div>
@endforeach

@endsection
