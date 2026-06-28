@extends('layouts.app')
@section('title', 'Destinations')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-lg font-semibold text-blue-950">Destinations</h2>
        <p class="text-sm text-gray-500 mt-0.5">
            {{ $destinations->count() }} {{ $destinations->count() == 1 ? 'destination' : 'destinations' }} across your packages.
        </p>
    </div>
    <a href="{{ route('destinations.create') }}"
        class="bg-orange-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center shrink-0">
        <i class="ri-add-line mr-1.5"></i>Add Destination
    </a>
</div>

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
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200 group">

                {{-- Image --}}
                @if($destination->photopath)
                    <div class="relative h-44 overflow-hidden">
                        <img src="{{ asset('images/' . $destination->photopath) }}"
                            alt="{{ $destination->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-950/40 to-transparent"></div>
                    </div>
                @else
                    <div class="w-full h-44 bg-gradient-to-br from-blue-50 to-orange-50 flex flex-col items-center justify-center">
                        <i class="ri-map-pin-line text-orange-300 text-4xl mb-1"></i>
                        <span class="text-xs text-gray-400">No photo</span>
                    </div>
                @endif

                <div class="p-5">
                    {{-- Name --}}
                    <h3 class="text-base font-semibold text-blue-950 mb-1.5">{{ $destination->name }}</h3>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500 mb-3 leading-relaxed">
                        {{ $destination->description ? Str::limit($destination->description, 100) : 'No description added yet.' }}
                    </p>

                    {{-- Coordinates --}}
                    @if($destination->latitude && $destination->longitude)
                        <div class="flex items-center gap-1.5 mb-4">
                            <span class="inline-flex items-center gap-1 text-xs text-gray-400 bg-gray-50 px-2.5 py-1 rounded-full">
                                <i class="ri-map-pin-line text-orange-400"></i>
                                {{ number_format($destination->latitude, 4) }}, {{ number_format($destination->longitude, 4) }}
                            </span>
                        </div>
                    @else
                        <div class="mb-4">
                            <span class="inline-flex items-center gap-1 text-xs text-gray-300 bg-gray-50 px-2.5 py-1 rounded-full">
                                <i class="ri-map-pin-line"></i> No coordinates
                            </span>
                        </div>
                    @endif

                    {{-- Footer --}}
                    <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                        <span class="text-xs font-medium text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">
                            <i class="ri-suitcase-line mr-1"></i>
                            {{ $destination->packages->count() }} {{ $destination->packages->count() == 1 ? 'package' : 'packages' }}
                        </span>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('destinations.edit', $destination->id) }}"
                                class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-150"
                                title="Edit">
                                <i class="ri-edit-line"></i>
                            </a>
                            <button
                                data-action="{{ route('destinations.destroy', $destination->id) }}"
                                data-name="{{ $destination->name }}"
                                class="delete-destination-btn w-9 h-9 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-150"
                                title="Delete">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

{{-- Delete Confirmation Modal --}}
<div id="deleteDestinationModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex justify-center items-center px-4">
    <div class="bg-white p-8 rounded-2xl max-w-md w-full shadow-xl">
        <div class="flex flex-col items-center text-center mb-6">
            <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-red-100 text-red-600 mb-4">
                <i class="ri-delete-bin-line text-2xl"></i>
            </span>
            <h3 class="text-xl font-bold text-blue-950 mb-2">Delete Destination</h3>
            <p class="text-gray-500 text-sm">
                Are you sure you want to delete
                <span id="deleteDestinationName" class="font-semibold text-gray-700"></span>?
                This action cannot be undone.
            </p>
        </div>
        <div class="flex justify-end gap-3">
            <button id="closeDeleteDestinationModal" type="button"
                class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-150">
                Cancel
            </button>
            <form id="deleteDestinationForm" action="" method="GET" class="inline">
                <button type="submit"
                    class="bg-red-600 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-red-700 transition-colors duration-150">
                    <i class="ri-delete-bin-line mr-1.5"></i>Delete
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
            button.addEventListener('click', function () {
                deleteForm.action = this.getAttribute('data-action');
                deleteName.textContent = this.getAttribute('data-name');
                modal.classList.remove('hidden');
            });
        });

        closeModalBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', function (e) {
            if (e.target === modal) modal.classList.add('hidden');
        });
    });
</script>

@endsection
