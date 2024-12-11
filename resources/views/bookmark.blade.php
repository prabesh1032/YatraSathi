@extends('layouts.master')

@section('content')
<h1 class="text-blue-800 text-4xl text-center font-bold my-10">My Bookmarks</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 px-5 md:px-20">
    @forelse($bookmarks as $bookmark)
    <div class="p-5 border shadow-lg rounded-lg bg-gradient-to-br from-white to-gray-100 hover:shadow-xl transform hover:scale-105 transition duration-300 ease-in-out">
        <img src="{{ asset('images/' . $bookmark->package->photopath) }}" alt="Package Image" class="w-full h-40 object-cover rounded-lg mb-4">
        <div class="flex flex-col gap-2">
            <h1 class="text-xl font-bold text-blue-700">{{ $bookmark->package->name }}</h1>
            <p class="text-gray-600">💰 <span class="font-semibold">${{ number_format($bookmark->total_price, 2) }}</span></p> <!-- Show total price -->
            <p class="text-gray-600">📅 Duration: <span class="font-semibold">{{ $bookmark->package->duration }} days</span></p>
            <p class="text-gray-600">📍 Location: <span class="font-semibold">{{ $bookmark->package->location }}</span></p>
            <p class="text-gray-600">👥 Number of People: <span class="font-semibold">{{ $bookmark->num_people }}</span></p> <!-- Show number of people -->
        </div>
        <div class="flex justify-between mt-4">
            <button onclick="showModal('{{ $bookmark->id }}')" class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-400">Remove</button>
            <a href="{{ route('bookmarks.checkout', $bookmark->id) }}" class="bg-green-500 text-white px-3 py-2 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400">Book Now</a>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center">
        <h2 class="text-2xl font-bold text-gray-600">No bookmarks found</h2>
        <p class="text-gray-500">Start exploring packages and bookmark your favorites!</p>
        <a href="{{ route('packages') }}" class="mt-5 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">Browse Packages</a>
    </div>
    @endforelse
</div>

<!-- Delete Modal -->
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-md hidden items-center justify-center z-50" id="deleteModal">
    <form id="deleteForm" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-md">
        @csrf
        @method('DELETE')
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-4">Are You Sure You Want to Delete?</h1>
        <p class="text-gray-600 text-center mb-6">This action cannot be undone.</p>
        <div class="flex justify-center gap-5">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">Yes, Delete</button>
            <button type="button" onclick="hideModal()" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-400">Cancel</button>
        </div>
    </form>
</div>

<script>
    function hideModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }

    function showModal(id) {
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = "/bookmarks/" + id;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }
</script>
@endsection
