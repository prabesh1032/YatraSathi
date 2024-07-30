
 @extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold text-gray-800">Packages</h1>
        <a href="{{ route('packages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">Create Package</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($packages as $package)
        <div class="shadow-lg rounded-lg bg-lime-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
            @if($package->photopath)
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
            @endif
            <div class="p-4">
                <h3 class="text-xl font-bold text-gray-900">{{ $package->name }}</h3>
                <div class="text-gray-700 mt-2"><i class="ri-map-pin-2-line text-green-500"></i> {{ $package->location }}</div>
                <div class="text-gray-700 mt-2"><i class="ri-calendar-line text-green-500"></i> {{ $package->duration }} days</div>
                <div class="text-gray-700 mt-2"><i class="ri-group-line text-green-500"></i> {{ $package->people }} Person</div>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-green-600 font-bold text-lg">${{ $package->price }}</span>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('packages.edit', $package->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-600">Edit</a>
                        <a href="{{route('packages.destroy',$package->id)}}"
                            class="bg-red-700 text-whitr px-3 py-1.5 rounded-lg"
                            onclick= "return confirm('Are you sure to delete')">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

