@extends('layouts.app')
@section('title', 'Edit Guide')
@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-lg font-semibold text-blue-950">Edit Guide</h2>
        <p class="text-sm text-gray-500 mt-0.5">Update this guide's profile and assignment.</p>
    </div>
    <a href="{{ route('guides.index') }}"
        class="bg-blue-50 text-blue-900 px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-100 transition-colors duration-200 flex items-center shrink-0">
        <i class="ri-arrow-left-line mr-1.5"></i>Back
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
    <form action="{{ route('guides.update', $guide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- LEFT COLUMN --}}
            <div class="space-y-5">

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-blue-950 mb-1.5">
                        Full Name <span class="text-orange-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $guide->name) }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('name') border-red-300 ring-1 ring-red-200 @enderror"
                        placeholder="e.g. Anil Sherpa" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-blue-950 mb-1.5">
                        Email <span class="text-orange-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email', $guide->email) }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('email') border-red-300 ring-1 ring-red-200 @enderror"
                        placeholder="guide@example.com" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Experience & Package --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="experience" class="block text-sm font-semibold text-blue-950 mb-1.5">
                            <i class="ri-award-line text-orange-500 mr-1"></i>Experience (yrs) <span class="text-orange-500">*</span>
                        </label>
                        <input type="number" id="experience" name="experience" value="{{ old('experience', $guide->experience) }}"
                            min="1" max="100"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('experience') border-red-300 ring-1 ring-red-200 @enderror"
                            placeholder="5" required>
                        @error('experience')
                            <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="package_id" class="block text-sm font-semibold text-blue-950 mb-1.5">
                            <i class="ri-suitcase-line text-orange-500 mr-1"></i>Package <span class="text-orange-500">*</span>
                        </label>
                        <select id="package_id" name="package_id"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('package_id') border-red-300 ring-1 ring-red-200 @enderror"
                            required>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id', $guide->package_id) == $package->id ? 'selected' : '' }}>
                                    {{ $package->package_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('package_id')
                            <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-semibold text-blue-950 mb-1.5">
                        Description <span class="text-orange-500">*</span>
                    </label>
                    <textarea id="description" name="description" rows="6"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-800 bg-gray-50 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 focus:bg-white outline-none transition-all duration-200 @error('description') border-red-300 ring-1 ring-red-200 @enderror"
                        placeholder="Brief bio — languages spoken, specialties, certifications..." required>{{ old('description', $guide->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="space-y-5">

                {{-- Photo Upload with Preview --}}
                <div>
                    <label class="block text-sm font-semibold text-blue-950 mb-1.5">
                        <i class="ri-image-line text-orange-500 mr-1"></i>Guide Photo
                    </label>

                    <div id="preview-container" class="{{ $guide->photopath ? '' : 'hidden' }} mb-3 relative">
                        <img id="image-preview"
                            src="{{ $guide->photopath ? asset('images/' . $guide->photopath) : '#' }}"
                            alt="Preview"
                            class="w-full h-56 object-cover rounded-xl border border-gray-200 shadow-sm">
                        <button type="button" onclick="removeImage()"
                            class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center transition-colors duration-200 shadow">
                            <i class="ri-close-line text-sm"></i>
                        </button>
                    </div>

                    <label for="photopath" id="upload-area"
                        class="{{ $guide->photopath ? 'hidden' : '' }} flex flex-col items-center justify-center w-full h-56 px-4 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 hover:bg-orange-50/40 hover:border-orange-300 transition-colors duration-200 cursor-pointer text-center">
                        <div class="w-14 h-14 bg-orange-50 rounded-full flex items-center justify-center mb-3">
                            <i class="ri-upload-cloud-2-line text-3xl text-orange-500"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Click to upload a photo</span>
                        <span class="text-xs text-gray-400 mt-1">JPEG, PNG, JPG, GIF — Max 2MB</span>
                    </label>

                    <input type="file" id="photopath" name="photopath" accept="image/*" class="hidden"
                        onchange="previewImage(this)">
                    <p class="text-xs text-gray-400 mt-1.5">Leave blank to keep the current photo.</p>

                    @error('photopath')
                        <p class="text-red-500 text-xs mt-1.5"><i class="ri-error-warning-line mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex justify-end gap-3 pt-5 mt-5 border-t border-gray-100">
            <a href="{{ route('guides.index') }}"
                class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-200">
                Cancel
            </a>
            <button type="submit"
                class="bg-orange-500 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center gap-1.5">
                <i class="ri-save-line"></i> Update Guide
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
