@extends('layouts.app')

@section('title', 'Create Booking')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold mb-4">Create Booking</h1>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block text-gray-700">User</label>
                <input type="text" name="user_id" id="user_id" class="border p-2 w-full"
                value="{{ old('user_id') }}" required>
                @error('user_id')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                    @enderror

            </div>
            <div class="mb-4">
                <label for="destination_id" class="block text-gray-700">Destination</label>
                <select name="destination_id" id="destination_id" class="border p-2 w-full" required>
                    @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}" {{ old('destination_id') == $destination->id ? 'selected' : '' }}>{{ $destination->name }}</option>
                    @endforeach
                </select>
                @error('destination_id')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="border p-2 w-full"
                value="{{ old('start_date') }}" required>
                @error('start_date')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700">End Date</label>
                <input type="date" name="end_date" id="end_date" class="border p-2 w-full"
                value="{{ old('end_date') }}" required>
                @error('end_date')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="guests" class="block text-gray-700">Guests</label>
                <input type="number" name="guests" id="guests" class="border p-2 w-full"
                value="{{ old('guests') }}" required>
                @error('guests')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="total_price" class="block text-gray-700">Total Price</label>
                <input type="number" step="0.01" name="total_price" id="total_price" class="border p-2 w-full"
                value="{{ old('total_price') }}" required>
                @error('total_price')
                        <div class="text-red-600 mt-2 text-5m">
                            *{{$message}}
                        </div>
                    @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Booking</button>
        </form>
    </div>
@endsection
