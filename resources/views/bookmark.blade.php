@extends('layouts.master')

@section('content')
<div class="flex items-center justify-between mt-10 mb-4">
    <h1 class="text-gray-900 text-5xl text-center font-extrabold mx-auto"><i class="ri-map-pin-line text-5xl text-yellow-500 "></i>
        My Travelling <span class="text-yellow-500">Plans</span>
    </h1>
</div>
<p class="text-gray-700 font-bold text-xl text-center mb-8  mt-4 mx-auto max-w-2xl">
    Keep track of your bookings and plan your next adventure with ease.
</p>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 px-5 md:px-20 mb-10">
    @forelse($bookmarks as $bookmark)
    <div class="p-5 border shadow-lg text-center rounded-lg bg-gradient-to-br from-yellow-100 to-gray-100 hover:shadow-2xl hover:-translate-y-2 transform transition duration-300 ease-in-out">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900">{{ $bookmark->package->name }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- Image Section -->
            <div class="flex justify-center">
                <img src="{{ asset('images/' . $bookmark->package->photopath) }}" alt="Package Image" class="w-full h-64 object-cover rounded-lg shadow-sm">
            </div>

            <!-- Package Information Section -->
            <div class="flex flex-col gap-3">
                <p class="text-green-500 flex text-xl items-center gap-2">
                    <i class="ri-money-dollar-circle-line text-green-500"></i>
                    <span class="font-bold">${{ number_format($bookmark->total_price, 2) }}</span>
                </p>
                <p class="text-gray-900 flex text-xl font-extrabold items-center gap-2">
                    <i class="ri-calendar-line text-blue-500"></i>
                    <span>Duration: <span class="font-bold">{{ $bookmark->duration }} days</span></span>
                </p>
                <p class="text-gray-900 flex text-xl font-extrabold items-center gap-2">
                    <i class="ri-map-pin-line text-red-500"></i>
                    <span>Location: <span class="font-bold">{{ $bookmark->package->location }}</span></span>
                </p>
                <p class="text-gray-900 flex text-xl font-extrabold items-center gap-2">
                    <i class="ri-user-line text-yellow-500"></i>
                    <span>People: <span class="font-bold">{{ $bookmark->num_people }}</span></span>
                </p>
                <p class="text-gray-900 flex text-xl font-extrabold items-center gap-2">
                    <i class="ri-user-smile-line text-green-500"></i>
                    <span>Guide:
                        <span class="font-bold text-blue-500">
                            {{ $bookmark->guide ? $bookmark->guide->name : 'Not Selected' }}
                        </span>
                    </span>
                </p>
        <!-- Action Buttons -->
                <div class="flex justify-between mt-5">
                    <button onclick="showModal('{{ $bookmark->id }}')" class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 shadow-md transition">
                        <i class="ri-delete-bin-line mr-2"></i>Remove
                    </button>
                    <a href="{{ route('bookmarks.checkout', $bookmark->id) }}" class="bg-green-500 text-white px-3 py-2 rounded-lg hover:bg-green-600 shadow-md transition">
                        <i class="ri-shopping-cart-line mr-2"></i>Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12">
        <img src="{{ asset('notfound.jpg') }}" alt="No Results Found" class="mx-auto w-1/3 h-auto mb-6">
        <h2 class="text-2xl font-extrabold text-gray-600">No bookmarks found</h2>
        <p class="text-gray-500 mb-5">Start exploring packages and bookmark your favorites!</p>
        <a href="{{ route('packages') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
            Browse Packages
        </a>
    </div>
    @endforelse
</div>

<!-- Delete Modal -->
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden items-center justify-center z-50" id="deleteModal">
    <form id="deleteForm" method="POST" class="bg-white p-6 rounded-lg shadow-2xl max-w-md">
        @csrf
        @method('DELETE')
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-4">
            <i class="ri-error-warning-line text-yellow-500 mr-2"></i> Confirm Deletion
        </h1>
        <p class="text-gray-600 text-center mb-6">Are you sure you want to remove this bookmark? This action cannot be undone.</p>
        <div class="flex justify-center gap-5">
            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-400">
                <i class="ri-check-line mr-2"></i>Yes, Delete
            </button>
            <button type="button" onclick="hideModal()" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-400">
                <i class="ri-close-line mr-2"></i>Cancel
            </button>
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
