@extends('layouts.app')
@section('title', 'Add Destination')
@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-semibold text-blue-950">Add New Destination</h2>
            <p class="text-sm text-gray-500 mt-0.5">Add a new location travellers can explore.</p>
        </div>
        <a href="{{ route('destinations.index') }}"
            class="bg-blue-50 text-blue-900 px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-100 transition-colors duration-200 flex items-center shrink-0">
            <i class="ri-arrow-left-line mr-1.5"></i>Back
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 max-w-2xl">

        <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-blue-950 mb-1.5">Destination Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('name') border-red-300 ring-1 ring-red-200 @enderror"
                       placeholder="Enter destination name" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-blue-950 mb-1.5">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('description') border-red-300 ring-1 ring-red-200 @enderror"
                          placeholder="Enter destination description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="latitude" class="block text-sm font-semibold text-blue-950 mb-1.5">Latitude</label>
                    <input type="number" id="latitude" name="latitude" value="{{ old('latitude') }}"
                           step="any" min="-90" max="90"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('latitude') border-red-300 ring-1 ring-red-200 @enderror"
                           placeholder="27.7172">
                    @error('latitude')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="longitude" class="block text-sm font-semibold text-blue-950 mb-1.5">Longitude</label>
                    <input type="number" id="longitude" name="longitude" value="{{ old('longitude') }}"
                           step="any" min="-180" max="180"
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('longitude') border-red-300 ring-1 ring-red-200 @enderror"
                           placeholder="85.3240">
                    @error('longitude')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="photopath" class="block text-sm font-semibold text-blue-950 mb-1.5">Destination Photo</label>
                <label for="photopath"
                    class="flex flex-col items-center justify-center w-full py-6 px-4 rounded-lg border-2 border-dashed border-gray-200 bg-gray-50 hover:bg-orange-50/40 hover:border-orange-300 transition-colors duration-200 cursor-pointer text-center @error('photopath') border-red-300 @enderror">
                    <i class="ri-upload-cloud-2-line text-2xl text-orange-500 mb-1.5"></i>
                    <span class="text-sm font-medium text-gray-600" id="photopath-label">Click to upload a photo</span>
                    <span class="text-xs text-gray-400 mt-1">JPEG, PNG, JPG, GIF, AVIF — Max 2MB</span>
                </label>
                <input type="file" id="photopath" name="photopath" accept="image/*" class="hidden" onchange="document.getElementById('photopath-label').textContent = this.files[0] ? this.files[0].name : 'Click to upload a photo'">
                @error('photopath')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('destinations.index') }}"
                    class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-orange-500 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center">
                    <i class="ri-save-line mr-1.5"></i>Create Destination
                </button>
            </div>
        </form>
    </div>

@endsection
