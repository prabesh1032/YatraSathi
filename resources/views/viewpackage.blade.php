@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Package Details Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
        <div class="col-span-1">
            <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->name }}" class="h-96 w-full object-cover rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
        </div>
        <div class="col-span-2 px-4 border-x-2 border-gray-300">
            <h1 class="text-4xl font-bold text-blue-800">{{ $package->name }}</h1>
            <h2 class="text-2xl font-bold mt-4 text-yellow-600">${{ $package->price }}</h2>
            <p class="text-gray-700 mt-4">Available spots: <span id="stock" class="font-bold">{{ $package->stock }}</span></p>
            <form action="{{route('bookmarks.store')}} "method="POST">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <button type="submit" class="bg-gradient-to-r from-red-600 via-yellow-400 to-gray-600 text-white px-4 py-2
                rounded-lg mt-4 inline-block transform transition-transform duration-300 hover:scale-105">Bookmark</button>
            </form>
        </div>
        <div class="col-span-1 space-y-4">
            <a href="#" class="block p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-700 hover:bg-blue-100">
                <p class="font-bold">Special Offers</p>
                <p class="text-sm">Get the best deals and discounts on our packages. Limited time offers available now!</p>
            </a>
            <a href="#" class="block p-4 bg-green-50 border-l-4 border-green-500 text-green-700 hover:bg-green-100">
                <p class="font-bold">Customer Reviews</p>
                <p class="text-sm">Read reviews from our satisfied customers and learn about their travel experiences with YatraSathi.</p>
            </a>
            <a href="#" class="block p-4 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700 hover:bg-yellow-100">
                <p class="font-bold">Travel Tips</p>
                <p class="text-sm">Check out our travel tips and guides to make the most out of your next adventure.</p>
            </a>
        </div>
    </div>

    <!-- Description Section -->
    <div class="mt-12">
        <h1 class="text-3xl font-bold">Description</h1>
        <p class="text-gray-600 mt-4">{{ $package->description }}</p>
    </div>

    <!-- Related Packages Section -->
    <div class="my-10">
        <h1 class="text-3xl font-bold mb-6">Related Packages</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedpackages as $relatedpackage)
                <div class="border shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <a href="{{ route('packages.show', $relatedpackage->id) }}">
                        <img src="{{ asset('images/' . $relatedpackage->photopath) }}" alt="{{ $relatedpackage->name }}" class="h-60 w-full object-cover transition-transform duration-300 hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900">{{ $relatedpackage->name }}</h3>
                            <p class="text-gray-600 mt-2">Rs.{{ $relatedpackage->price }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
