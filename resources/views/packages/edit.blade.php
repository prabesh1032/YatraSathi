@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Edit Package</h1>
        <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Package Name</label>
                <input type="text" name="name" value="{{ $package->package_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('name')
                <div class="text-red-600 mt-2 text-sm">
                    *{{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="destination_id" class="block text-sm font-medium text-gray-700">Destination *</label>
                <select name="destination_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    <option value="">Select Destination</option>
                    @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}" {{ $package->destination_id == $destination->id ? 'selected' : '' }}>
                            {{ $destination->name }}
                        </option>
                    @endforeach
                </select>
                @error('destination_id')
                <div class="text-red-600 mt-2 text-sm">
                    *{{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Specific Location</label>
                <input type="text" name="location" value="{{ $package->package_location }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('location')
                <div class="text-red-600 mt-2 text-sm">
                    *{{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="starting_location" class="block text-sm font-medium text-gray-700">Stating Location</label>
                <input type="text" name="starting_location" value="{{ $package->starting_location }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('starting_location')
                <div class="text-red-600 mt-2 text-sm">
                    *{{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (days)</label>
                <input type="number" name="duration" value="{{ $package->duration }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('duration')
                <div class="text-red-600 mt-2 text-sm">
                    *{{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" value="{{ $package->package_price }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('price')
                <div class="text-red-600 mt-2 text-sm">
                    *{{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="photopath" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="photopath" value="{{$package->photopath}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('photopath')
                <div class="text-red-600 mt-2 text-sm">
                    *{{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ $package->package_description }}</textarea>
                @error('description')
                <div class="text-red-600 mt-2 text-sm">
                    *{{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="transportation" class="block text-sm font-medium text-gray-700">Transportation</label>
                <input type="text" name="transportation" value="{{ $package->transportation }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="e.g., Private bus, Flight">
                @error('transportation')
                <div class="text-red-600 mt-2 text-sm">
                    *{{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="accommodation" class="block text-sm font-medium text-gray-700">Accommodation</label>
                <input type="text" name="accommodation" value="{{ $package->accommodation }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="e.g., 3-star hotel, Lodge">
                @error('accommodation')
                <div class="text-red-600 mt-2 text-sm">
                    *{{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="meals" class="block text-sm font-medium text-gray-700">Meals</label>
                <input type="text" name="meals" value="{{ $package->meals }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="e.g., Breakfast included, All meals">
                @error('meals')
                <div class="text-red-600 mt-2 text-sm">
                    *{{$message}}
                </div>
                @enderror
            </div>

            <!-- Add Latitude and Longitude Fields -->
            <div class="mb-4">
                <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                <input type="text" name="latitude" value="{{ $package->latitude }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('latitude')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                <input type="text" name="longitude" value="{{ $package->longitude }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                @error('longitude')
                    <div class="text-red-600 mt-2 text-sm">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
