@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Add New Guide</h1>
        <form action="{{ route('guides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('name')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('email')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="photopath" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" name="photopath" id="photopath" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('photopath')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="package_id" class="block text-sm font-medium text-gray-700">Package</label>
                <select name="package_id" id="package_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    <option value="" disabled selected>Select a package</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                    @endforeach
                </select>
                @error('package_id')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-700">Add Guide</button>
            </div>
        </form>
    </div>
</div>
@endsection
