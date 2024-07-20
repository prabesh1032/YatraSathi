@extends('layouts.app')

@section('title', 'Edit Destination')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold mb-4">Edit Destination</h1>
        <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="border rounded w-full p-2"
                value="{{ old('name', $destination->name) }}" required>
                @error('name')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="border rounded w-full p-2" required>{{ old('description', $destination->description) }}</textarea>
                @error('description')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="photopath" class="block text-gray-700">Image</label>
                <input type="file" name="photopath" id="photopath" class="border rounded w-full p-2">
                @if($destination->photopath)
                    <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}" class="w-32 h-auto mt-2">
                @endif
                @error('photopath')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mr-2">Update</button>
                <a href="{{ route('destinations.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            </div>
        </form>
    </div>
@endsection
