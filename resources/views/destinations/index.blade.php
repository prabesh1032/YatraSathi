@extends('layouts.app')

@section('title', 'Destinations')

@section('content')
    <div class="container mx-auto">
        <a href="{{ route('destinations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Add Destination</a>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($destinations as $destination)
                <div class="p-4 rounded-lg shadow bg-lime-100">
                    <h2 class="text-2xl font-bold">{{ $destination->name }}</h2>
                    <p>{{ $destination->description }}</p>

                    @if($destination->photopath != '')
                        <img src="{{ asset('images/' . $destination->photopath) }}"
                        alt="{{ $destination->name }}" class=" p-4 w-full h-64
                         mt-4 rounded-lg object-cover transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                    @endif
                    <div class="mt-4 flex">
                        <a href="{{ route('destinations.edit', $destination->id) }}"
                        class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">Edit</a>
                         <a href="{{route('destinations.destroy',$destination->id)}}"
                        class="bg-red-700 text-whitr px-3 py-1.5 rounded-lg"
                onclick= "return confirm('Are you sure to delete')">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


