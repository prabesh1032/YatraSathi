@extends('layouts.app')
@section('title', 'Destinations')
@section('content')

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-lg font-semibold text-blue-950">Destinations</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $destinations->count() }} {{ $destinations->count() == 1 ? 'destination' : 'destinations' }} across your packages.</p>
        </div>
        <a href="{{ route('destinations.create') }}"
            class="bg-orange-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center shrink-0">
            <i class="ri-add-line mr-1.5"></i>Add Destination
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center text-sm">
            <i class="ri-check-circle-line mr-2 text-green-500 text-lg"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($destinations->isEmpty())
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 text-center py-16 px-4">
            <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-orange-100 text-orange-500 mb-4">
                <i class="ri-map-pin-line text-3xl"></i>
            </span>
            <h3 class="text-lg font-semibold text-blue-950 mb-1">No destinations found</h3>
            <p class="text-sm text-gray-500 mb-6">Start by adding your first destination.</p>
            <a href="{{ route('destinations.create') }}"
                class="inline-flex items-center bg-orange-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200">
                <i class="ri-add-line mr-1.5"></i>Add Destination
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($destinations as $destination)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-200">

                    @if($destination->photopath)
                        <img src="{{ asset('images/' . $destination->photopath) }}" alt="{{ $destination->name }}" class="w-full h-44 object-cover">
                    @else
                        <div class="w-full h-44 bg-gray-50 flex items-center justify-center">
                            <i class="ri-image-line text-gray-300 text-4xl"></i>
                        </div>
                    @endif

                    <div class="p-5">
                        <h3 class="text-base font-semibold text-blue-950 mb-1.5">{{ $destination->name }}</h3>
                        <p class="text-sm text-gray-500 mb-3 leading-relaxed">{{ Str::limit($destination->description, 100) }}</p>

                        @if($destination->latitude && $destination->longitude)
                            <p class="text-xs text-gray-400 mb-4 flex items-center">
                                <i class="ri-map-pin-line mr-1.5"></i>
                                {{ $destination->latitude }}, {{ $destination->longitude }}
                            </p>
                        @endif

                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <span class="text-xs font-medium text-gray-500 bg-gray-50 px-2.5 py-1 rounded-full">
                                {{ $destination->packages_count ?? $destination->packages->count() }} packages
                            </span>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('destinations.edit', $destination->id) }}"
                                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-150"
                                    aria-label="Edit destination">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <a href="{{ route('destinations.destroy', $destination->id) }}"
                                    data-action="{{ route('destinations.destroy', $destination->id) }}"
                                    data-name="{{ $destination->name }}"
                                    class="delete-destination-btn w-9 h-9 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-150"
                                    aria-label="Delete destination">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    <div id="deleteDestinationModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex justify-center items-center px-4">
        <div class="bg-white p-8 rounded-2xl max-w-md w-full space-y-4 shadow-xl">
            <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-100 text-red-600">
                <i class="ri-delete-bin-line text-xl"></i>
            </span>
            <h3 class="text-xl font-bold text-blue-950">Delete Destination</h3>
            <p class="text-gray-500 text-sm">
                Are you sure you want to delete <span id="deleteDestinationName" class="font-semibold text-gray-700"></span>?
                This action cannot be undone.
            </p>
            <div class="flex justify-end gap-3 pt-2">
                <button id="closeDeleteDestinationModal" type="button" class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-150">
                    Cancel
                </button>
                <form id="deleteDestinationForm" action="" method="GET" class="inline">
                    <button type="submit" class="bg-red-600 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-red-700 transition-colors duration-150">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('deleteDestinationModal');
            const closeModalBtn = document.getElementById('closeDeleteDestinationModal');
            const deleteButtons = document.querySelectorAll('.delete-destination-btn');
            const deleteForm = document.getElementById('deleteDestinationForm');
            const deleteName = document.getElementById('deleteDestinationName');

            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    deleteForm.action = this.getAttribute('data-action');
                    deleteName.textContent = this.getAttribute('data-name');
                    modal.classList.remove('hidden');
                });
            });

            closeModalBtn.addEventListener('click', function () {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>

@endsection
