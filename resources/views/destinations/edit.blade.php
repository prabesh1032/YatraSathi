@extends('layouts.app')
@section('title', 'Edit Destination')
@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-lg font-semibold text-blue-950">Edit Destination</h2>
        <p class="text-sm text-gray-500 mt-0.5">Update the details of this destination.</p>
    </div>
    <a href="{{ route('destinations.index') }}"
        class="bg-blue-50 text-blue-900 px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-100 transition-colors duration-200 flex items-center shrink-0">
        <i class="ri-arrow-left-line mr-1.5"></i>Back
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
    <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- LEFT COLUMN --}}
            <div class="space-y-5">

                {{-- Destination Name --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-blue-950 mb-1.5">
                        Destination Name <span class="text-orange-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $destination->name) }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('name') border-red-300 ring-1 ring-red-200 @enderror"
                        placeholder="e.g. Pokhara, Everest Base Camp" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-semibold text-blue-950 mb-1.5">Description</label>
                    <textarea id="description" name="description" rows="5"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('description') border-red-300 ring-1 ring-red-200 @enderror"
                        placeholder="Describe what makes this destination special...">{{ old('description', $destination->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Latitude & Longitude --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="latitude" class="block text-sm font-semibold text-blue-950 mb-1.5">
                            <i class="ri-map-pin-line text-orange-500 mr-1"></i>Latitude
                        </label>
                        <input type="number" id="latitude" name="latitude" value="{{ old('latitude', $destination->latitude) }}"
                            step="any" min="-90" max="90"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('latitude') border-red-300 ring-1 ring-red-200 @enderror"
                            placeholder="27.7172">
                        @error('latitude')
                            <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="longitude" class="block text-sm font-semibold text-blue-950 mb-1.5">
                            <i class="ri-map-pin-line text-orange-500 mr-1"></i>Longitude
                        </label>
                        <input type="number" id="longitude" name="longitude" value="{{ old('longitude', $destination->longitude) }}"
                            step="any" min="-180" max="180"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('longitude') border-red-300 ring-1 ring-red-200 @enderror"
                            placeholder="85.3240">
                        @error('longitude')
                            <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="space-y-5">

                {{-- Photo Upload with Preview --}}
                <div>
                    <label class="block text-sm font-semibold text-blue-950 mb-1.5">
                        <i class="ri-image-line text-orange-500 mr-1"></i>Destination Photo
                    </label>

                    {{-- Current/Preview Image --}}
                    <div id="preview-container" class="{{ $destination->photopath ? '' : 'hidden' }} mb-3 relative">
                        <img id="image-preview"
                            src="{{ $destination->photopath ? asset('images/' . $destination->photopath) : '#' }}"
                            alt="Preview"
                            class="w-full h-64 object-cover rounded-xl border border-gray-200 shadow-sm">

                        {{-- Current image badge --}}
                        @if($destination->photopath)
                        <div class="absolute top-2 left-2">
                            <span class="bg-blue-900/80 text-white text-xs font-semibold px-2.5 py-1 rounded-full backdrop-blur-sm">
                                <i class="ri-image-line mr-1"></i>Current Photo
                            </span>
                        </div>
                        @endif

                        <button type="button" onclick="removeImage()"
                            class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center transition-colors duration-200 shadow">
                            <i class="ri-close-line text-sm"></i>
                        </button>
                    </div>

                    {{-- Upload Area --}}
                    <label for="photopath" id="upload-area"
                        class="{{ $destination->photopath ? 'hidden' : '' }} flex flex-col items-center justify-center w-full h-64 px-4 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 hover:bg-orange-50/40 hover:border-orange-300 transition-colors duration-200 cursor-pointer text-center @error('photopath') border-red-300 @enderror">
                        <div class="w-14 h-14 bg-orange-50 rounded-full flex items-center justify-center mb-3">
                            <i class="ri-upload-cloud-2-line text-3xl text-orange-500"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Click to upload a new photo</span>
                        <span class="text-xs text-gray-400 mt-1">JPEG, PNG, JPG, GIF, AVIF — Max 2MB</span>
                    </label>

                    <input type="file" id="photopath" name="photopath" accept="image/*" class="hidden"
                        onchange="previewImage(this)">

                    @error('photopath')
                        <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                    @enderror

                    @if($destination->photopath)
                    <p class="text-xs text-gray-400 mt-2">
                        <i class="ri-information-line mr-1"></i>Upload a new photo to replace the current one.
                    </p>
                    @endif
                </div>

            </div>

        </div>

        {{-- Action Buttons --}}
        <div class="flex justify-end gap-3 pt-5 mt-5 border-t border-gray-100">
            <a href="{{ route('destinations.index') }}"
                class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-200">
                Cancel
            </a>
            <button type="submit"
                class="bg-orange-500 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center gap-1.5">
                <i class="ri-save-line"></i> Update Destination
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

                // Remove current photo badge if exists
                const badge = document.querySelector('.absolute.top-2.left-2');
                if (badge) badge.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        document.getElementById('image-preview').src = '#';
        document.getElementById('preview-container').classList.add('hidden');
        document.getElementById('upload-area').classList.remove('hidden');
        document.getElementById('photopath').value = '';
    }
</script>

@endsection
