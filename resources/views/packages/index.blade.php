@extends('layouts.app')
@section('title', 'Packages')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-lg font-semibold text-blue-950">Packages</h2>
        <p class="text-sm text-gray-500 mt-0.5">
            {{ $packages->count() }} {{ $packages->count() == 1 ? 'package' : 'packages' }} available for travellers.
        </p>
    </div>
    <a href="{{ route('packages.create') }}"
        class="bg-orange-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center shrink-0">
        <i class="ri-add-line mr-1.5"></i>Create Package
    </a>
</div>

@if($packages->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 text-center py-16 px-4">
        <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-orange-100 text-orange-500 mb-4">
            <i class="ri-suitcase-3-line text-3xl"></i>
        </span>
        <h3 class="text-lg font-semibold text-blue-950 mb-1">No packages found</h3>
        <p class="text-sm text-gray-500 mb-6">Start by creating your first tour package.</p>
        <a href="{{ route('packages.create') }}"
            class="inline-flex items-center bg-orange-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200">
            <i class="ri-add-line mr-1.5"></i>Create Package
        </a>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($packages as $package)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200 group">

        {{-- Image with floating price badge --}}
        <div class="relative h-44 overflow-hidden">
            @if($package->photopath)
                <img src="{{ asset('images/' . $package->photopath) }}"
                    alt="{{ $package->package_name }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            @else
                <div class="w-full h-full bg-gradient-to-br from-blue-50 to-orange-50 flex flex-col items-center justify-center">
                    <i class="ri-image-line text-orange-300 text-4xl mb-1"></i>
                    <span class="text-xs text-gray-400">No photo</span>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/50 to-transparent"></div>

            <span class="absolute top-3 right-3 bg-white/95 backdrop-blur text-blue-950 text-sm font-bold px-3 py-1 rounded-full shadow-sm">
                Rs. {{ number_format($package->package_price, 0) }}
            </span>

            <span class="absolute top-3 left-3 inline-flex items-center gap-1 bg-blue-950/70 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                <i class="ri-time-line"></i> {{ $package->duration }} {{ $package->duration == 1 ? 'day' : 'days' }}
            </span>

            <div class="absolute bottom-0 left-0 right-0 p-4">
                <h3 class="text-white text-base font-semibold drop-shadow-sm">{{ $package->package_name }}</h3>
            </div>
        </div>

        <div class="p-5">
            <div class="flex items-center gap-1.5 text-sm text-gray-600 mb-3">
                <i class="ri-flight-takeoff-line text-orange-400"></i>
                <span>{{ $package->starting_location }}</span>
                <i class="ri-arrow-right-line text-gray-300"></i>
                <i class="ri-map-pin-2-fill text-blue-700"></i>
                <span class="font-medium text-blue-950">{{ $package->package_location }}</span>
            </div>

            @if($package->destination)
                <div class="mb-3">
                    <span class="inline-flex items-center gap-1 text-xs text-gray-500 bg-gray-50 px-2.5 py-1 rounded-full">
                        <i class="ri-earth-line text-orange-400"></i>
                        {{ $package->destination->name }}
                    </span>
                </div>
            @endif

            <div class="flex flex-wrap gap-1.5 mb-4">
                @if($package->transportation)
                    <span class="inline-flex items-center gap-1 text-xs text-blue-700 bg-blue-50 px-2 py-1 rounded-md">
                        <i class="ri-bus-line"></i> {{ Str::limit($package->transportation, 18) }}
                    </span>
                @endif
                @if($package->accommodation)
                    <span class="inline-flex items-center gap-1 text-xs text-blue-700 bg-blue-50 px-2 py-1 rounded-md">
                        <i class="ri-hotel-line"></i> {{ Str::limit($package->accommodation, 18) }}
                    </span>
                @endif
                @if($package->meals)
                    <span class="inline-flex items-center gap-1 text-xs text-blue-700 bg-blue-50 px-2 py-1 rounded-md">
                        <i class="ri-restaurant-line"></i> {{ Str::limit($package->meals, 18) }}
                    </span>
                @endif
            </div>

            <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                <span class="text-xs font-medium text-green-700 bg-green-50 px-2.5 py-1 rounded-full">
                    <i class="ri-price-tag-3-line mr-1"></i> Rs. {{ number_format($package->package_price, 2) }}
                </span>
                <div class="flex items-center gap-2">
                    <a href="{{ route('packages.edit', $package->id) }}"
                        class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-150"
                        title="Edit">
                        <i class="ri-edit-line"></i>
                    </a>
                    <button
                        data-action="{{ route('packages.destroy', $package->id) }}"
                        data-name="{{ $package->package_name }}"
                        class="delete-package-btn w-9 h-9 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-150"
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
<div id="deletePackageModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex justify-center items-center px-4">
    <div class="bg-white p-8 rounded-2xl max-w-md w-full shadow-xl">
        <div class="flex flex-col items-center text-center mb-6">
            <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-red-100 text-red-600 mb-4">
                <i class="ri-delete-bin-line text-2xl"></i>
            </span>
            <h3 class="text-xl font-bold text-blue-950 mb-2">Delete Package</h3>
            <p class="text-gray-500 text-sm">
                Are you sure you want to delete
                <span id="deletePackageName" class="font-semibold text-gray-700"></span>?
                This action cannot be undone.
            </p>
        </div>
        <div class="flex justify-end gap-3">
            <button id="closeDeletePackageModal" type="button"
                class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-150">
                Cancel
            </button>
            <form id="deletePackageForm" action="" method="POST" class="inline">
                @csrf
                @method('DELETE')
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
        const modal = document.getElementById('deletePackageModal');
        const closeModalBtn = document.getElementById('closeDeletePackageModal');
        const deleteButtons = document.querySelectorAll('.delete-package-btn');
        const deleteForm = document.getElementById('deletePackageForm');
        const deleteName = document.getElementById('deletePackageName');

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
