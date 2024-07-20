@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold mb-4">Bookings</h1>
        <a href="{{ route('bookings.create') }}" class="bg-blue-500
         text-white px-4 py-2 rounded">Add Booking</a>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            @foreach($bookings as $booking)
                <div class="p-4 rounded-lg shadow bg-lime-100">
                    <p>Customer: {{ $booking->user_id }}</p>
                    <p>Destination: {{ $booking->destination->name }}</p>
                    <p>Dates: {{ $booking->start_date }} to {{ $booking->end_date }}</p>
                    <p>Guests: {{ $booking->guests }}</p>
                    <p>Total Price: ${{ $booking->total_price }}</p>
                    <div class="mt-4 flex">
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="bg-yellow-500
                         text-white px-4 py-2 rounded mr-2">Edit</a>
                        <a href="{{route('bookings.destroy',$booking->id)}}"
                        class="bg-red-700 text-whitr px-3 py-1.5 rounded-lg"
                        onclick= "return confirm('Are you sure to delete')">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
