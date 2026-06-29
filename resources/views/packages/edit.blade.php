@extends('layouts.app')
@section('title', 'Edit Package')
@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-semibold text-blue-950">Edit Package</h2>
            <p class="text-sm text-gray-500 mt-0.5">Update the details of this tour package.</p>
        </div>
        <a href="{{ route('packages.index') }}"
            class="bg-blue-50 text-blue-900 px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-100 transition-colors duration-200 flex items-center shrink-0">
            <i class="ri-arrow-left-line mr-1.5"></i>Back
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
        <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- LEFT COLUMN --}}
                <div class="space-y-5">

                    {{-- Package Name --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-blue-950 mb-1.5">
                            Package Name <span class="text-orange-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $package->name) }}"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('name') border-red-300 ring-1 ring-red-200 @enderror"
                            placeholder="e.g. Everest Base Camp Trek" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Destination --}}
                    <div>
                        <label for="destination_id" class="block text-sm font-semibold text-blue-950 mb-1.5">
                            Destination <span class="text-orange-500">*</span>
                        </label>
                        <select id="destination_id" name="destination_id"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('destination_id') border-red-300 ring-1 ring-red-200 @enderror"
                            required>
                            <option value="">Select Destination</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id', $package->destination_id) == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('destination_id')
                            <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Location & Starting Location --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="location" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                Specific Location <span class="text-orange-500">*</span>
                            </label>
                            <input type="text" id="location" name="location"
                                value="{{ old('location', $package->location) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('location') border-red-300 ring-1 ring-red-200 @enderror"
                                placeholder="e.g. Everest Base Camp" required>
                            @error('location')
                                <p class="text-red-500 text-xs mt-1.5"><i
                                        class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="starting_location" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                Starting Location <span class="text-orange-500">*</span>
                            </label>
                            <input type="text" id="starting_location" name="starting_location"
                                value="{{ old('starting_location', $package->starting_location) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('starting_location') border-red-300 ring-1 ring-red-200 @enderror"
                                placeholder="e.g. Kathmandu" required>
                            @error('starting_location')
                                <p class="text-red-500 text-xs mt-1.5"><i
                                        class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Duration & Price --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="duration" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                <i class="ri-time-line text-orange-500 mr-1"></i>Duration (days) <span
                                    class="text-orange-500">*</span>
                            </label>
                            <input type="number" id="duration" name="duration"
                                value="{{ old('duration', $package->duration) }}" min="1"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('duration') border-red-300 ring-1 ring-red-200 @enderror"
                                placeholder="7" required>
                            @error('duration')
                                <p class="text-red-500 text-xs mt-1.5"><i
                                        class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                <i class="ri-money-dollar-circle-line text-orange-500 mr-1"></i>Price (Rs) <span
                                    class="text-orange-500">*</span>
                            </label>
                            <input type="number" id="price" name="price" value="{{ old('price', $package->price) }}"
                                min="0" step="0.01"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('price') border-red-300 ring-1 ring-red-200 @enderror"
                                placeholder="299" required>
                            @error('price')
                                <p class="text-red-500 text-xs mt-1.5"><i
                                        class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Transportation, Accommodation, Meals --}}
                    <div>
                        <label for="transportation" class="block text-sm font-semibold text-blue-950 mb-1.5">
                            <i class="ri-bus-line text-orange-500 mr-1"></i>Transportation
                        </label>
                        <input type="text" id="transportation" name="transportation"
                            value="{{ old('transportation', $package->transportation) }}"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200"
                            placeholder="e.g. Private bus, Flight">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="accommodation" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                <i class="ri-hotel-line text-orange-500 mr-1"></i>Accommodation
                            </label>
                            <input type="text" id="accommodation" name="accommodation"
                                value="{{ old('accommodation', $package->accommodation) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200"
                                placeholder="e.g. 3-star hotel">
                        </div>

                        <div>
                            <label for="meals" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                <i class="ri-restaurant-line text-orange-500 mr-1"></i>Meals
                            </label>
                            <input type="text" id="meals" name="meals"
                                value="{{ old('meals', $package->meals) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200"
                                placeholder="e.g. Breakfast included">
                        </div>
                    </div>

                    {{-- Latitude & Longitude --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="latitude" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                <i class="ri-map-pin-line text-orange-500 mr-1"></i>Latitude
                            </label>
                            <input type="number" id="latitude" name="latitude"
                                value="{{ old('latitude', $package->latitude) }}" step="any" min="-90"
                                max="90"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('latitude') border-red-300 ring-1 ring-red-200 @enderror"
                                placeholder="27.7172">
                            @error('latitude')
                                <p class="text-red-500 text-xs mt-1.5"><i
                                        class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="longitude" class="block text-sm font-semibold text-blue-950 mb-1.5">
                                <i class="ri-map-pin-line text-orange-500 mr-1"></i>Longitude
                            </label>
                            <input type="number" id="longitude" name="longitude"
                                value="{{ old('longitude', $package->longitude) }}" step="any" min="-180"
                                max="180"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('longitude') border-red-300 ring-1 ring-red-200 @enderror"
                                placeholder="85.3240">
                            @error('longitude')
                                <p class="text-red-500 text-xs mt-1.5"><i
                                        class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="space-y-5">

                    {{-- Photo Upload with Preview --}}
                    <div>
                        <label class="block text-sm font-semibold text-blue-950 mb-1.5">
                            <i class="ri-image-line text-orange-500 mr-1"></i>Package Photo
                        </label>

                        {{-- Preview (shows current photo by default, or new selection) --}}
                        <div id="preview-container" class="{{ $package->photopath ? '' : 'hidden' }} mb-3 relative">
                            <img id="image-preview"
                                src="{{ $package->photopath ? asset('images/' . $package->photopath) : '#' }}"
                                alt="Preview"
                                class="w-full h-56 object-cover rounded-xl border border-gray-200 shadow-sm">
                            <button type="button" onclick="removeImage()"
                                class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center transition-colors duration-200 shadow">
                                <i class="ri-close-line text-sm"></i>
                            </button>
                        </div>

                        {{-- Upload Area (hidden by default if a photo already exists) --}}
                        <label for="photopath" id="upload-area"
                            class="{{ $package->photopath ? 'hidden' : '' }} flex flex-col items-center justify-center w-full h-56 px-4 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 hover:bg-orange-50/40 hover:border-orange-300 transition-colors duration-200 cursor-pointer text-center">
                            <div class="w-14 h-14 bg-orange-50 rounded-full flex items-center justify-center mb-3">
                                <i class="ri-upload-cloud-2-line text-3xl text-orange-500"></i>
                            </div>
                            <span class="text-sm font-semibold text-gray-700">Click to upload a photo</span>
                            <span class="text-xs text-gray-400 mt-1">JPEG, PNG, JPG, GIF, AVIF — Max 2MB</span>
                        </label>

                        <input type="file" id="photopath" name="photopath" accept="image/*" class="hidden"
                            onchange="previewImage(this)">

                        {{-- Flag so the controller knows the existing photo should be removed --}}
                        <input type="hidden" id="remove_photo" name="remove_photo" value="0">

                        @error('photopath')
                            <p class="text-red-500 text-xs mt-1.5"><i
                                    class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description"
                            class="block text-sm font-semibold text-blue-950 mb-1.5">Description</label>
                        <textarea id="description" name="description" rows="8"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('description') border-red-300 ring-1 ring-red-200 @enderror"
                            placeholder="Describe the tour package in detail — what's included, highlights, itinerary...">{{ old('description', $package->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1.5"><i
                                    class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end gap-3 pt-5 mt-5 border-t border-gray-100">
                <a href="{{ route('packages.index') }}"
                    class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-orange-500 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center gap-1.5">
                    <i class="ri-save-line"></i> Update Package
                </button>
            </div>

        </form>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('preview-container').classList.remove('hidden');
                    document.getElementById('upload-area').classList.add('hidden');
                    document.getElementById('remove_photo').value = '0';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            document.getElementById('image-preview').src = '#';
            document.getElementById('preview-container').classList.add('hidden');
            document.getElementById('upload-area').classList.remove('hidden');
            document.getElementById('photopath').value = '';
            document.getElementById('remove_photo').value = '1';
        }
    </script>

@endsection
