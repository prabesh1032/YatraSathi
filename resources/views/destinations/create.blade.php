@extends('layouts.app')

@section('title', 'Add Destination')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold mb-4">Add Destination</h1>
        <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="border rounded w-full p-2"
                value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="border rounded w-full p-2"
                required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                     @enderror
            </div>
            <div class="mb-4">
                <label for="photopath" class="block text-gray-700">Image</label>
                <input type="file" name="photopath" id="photopath" class="border rounded w-full p-2">
                    @error('photopath')
                        <div class="text-red-600 mt-2 text-sm">
                            *{{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="flex">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mr-2">
                    Save</button>
                <a href="{{ route('destinations.index') }}" class="bg-gray-500
                     text-white px-4 py-2 rounded">Cancel</a>
            </div>
        </form>
    </div>
@endsection
