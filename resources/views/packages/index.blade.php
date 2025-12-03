@extends('layouts.app')
@section('title', 'Packages')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Our Packages</h1>
        <a href="{{ route('packages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Create Package</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($packages as $package)
        <div class="shadow-lg rounded-lg bg-white overflow-hidden hover:shadow-xl transition-shadow duration-300">
            @if($package->photopath)
                <img src="{{ asset('images/' . $package->photopath) }}" alt="{{ $package->package_name }}" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105">
            @endif
            <div class="p-4">
                <h3 class="text-xl font-bold text-gray-900">{{ $package->package_name }}</h3>
                <div class="text-gray-700 mt-2 flex items-center"><i class="ri-map-pin-2-line text-green-500 mr-2"></i> {{ $package->package_location }}</div>
                <div class="text-gray-700 mt-2 flex items-center"><i class="ri-calendar-line text-green-500 mr-2"></i> {{ $package->duration }} days</div>

                <div class="flex justify-between items-center mt-4">
                    <span class="text-green-600 font-bold text-lg">${{ $package->package_price }}</span>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('packages.edit', $package->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition duration-300">Edit</a>
                        <button onclick="showModal('{{ $package->id }}')" class="bg-red-700 text-white px-3 py-1.5 rounded-lg shadow-md hover:bg-red-800 transition duration-300">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="fixed hidden inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50" id="deleteModal">
    <form id="deleteForm" method="POST" class="bg-white p-6 rounded-lg shadow-2xl max-w-md">
        @csrf
        @method('GET')
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-4">
            <i class="ri-error-warning-line text-yellow-500 mr-2"></i> Confirm Deletion
        </h1>
        <p class="text-gray-600 text-center mb-6">Are you sure you want to remove this package? This action cannot be undone.</p>
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
    function showModal(packageId) {
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/packages/${packageId}/destroy`; // Set action to delete route for package
        deleteModal.classList.remove('hidden');
    }

    function hideModal() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.classList.add('hidden');
    }
</script>
@endsection
