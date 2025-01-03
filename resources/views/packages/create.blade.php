@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Create Package</h1>
        <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="mt-1 block w-full border border-gray-300
                 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                 @error('name')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" class="mt-1 block w-full border border-gray-300
                 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                 @error('location')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (days)</label>
                <input type="number" name="duration" class="mt-1 block w-full border border-gray-300
                 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                 @error('duration')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                @enderror
            </div>
           <!-- <div class="mb-4">
                <label for="people" class="block text-sm font-medium text-gray-700">Number of People</label>
                <input type="number" name="people" class="mt-1 block w-full border border-gray-300
                 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                 @error('people')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                @enderror
            </div>-->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" class="mt-1 block w-full border border-gray-300
                 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                 @error('price')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="photopath" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="photopath" class="mt-1 block w-full border border-gray-300
                 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                 @error('photopath')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm
                 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                 @error('description')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-700">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
