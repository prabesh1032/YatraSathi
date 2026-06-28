@extends('layouts.app')
@section('title', 'Guides')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-lg font-semibold text-blue-950">Guides</h2>
        <p class="text-sm text-gray-500 mt-0.5">
            {{ $guides->count() }} {{ $guides->count() == 1 ? 'guide' : 'guides' }} on your team.
        </p>
    </div>
    <a href="{{ route('guides.create') }}"
        class="bg-orange-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200 flex items-center shrink-0">
        <i class="ri-add-line mr-1.5"></i>Add Guide
    </a>
</div>

@if($guides->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 text-center py-16 px-4">
        <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-orange-100 text-orange-500 mb-4">
            <i class="ri-user-3-line text-3xl"></i>
        </span>
        <h3 class="text-lg font-semibold text-blue-950 mb-1">No guides found</h3>
        <p class="text-sm text-gray-500 mb-6">Start by adding your first tour guide.</p>
        <a href="{{ route('guides.create') }}"
            class="inline-flex items-center bg-orange-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors duration-200">
            <i class="ri-add-line mr-1.5"></i>Add Guide
        </a>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($guides as $guide)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200 group">

                {{-- Photo --}}
                <div class="relative h-44 overflow-hidden">
                    @if($guide->photopath)
                        <img src="{{ asset('images/' . $guide->photopath) }}"
                            alt="{{ $guide->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-50 to-orange-50 flex flex-col items-center justify-center">
                            <i class="ri-user-3-line text-orange-300 text-4xl mb-1"></i>
                            <span class="text-xs text-gray-400">No photo</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-950/50 to-transparent"></div>

                    {{-- Experience badge --}}
                    <span class="absolute top-3 right-3 inline-flex items-center gap-1 bg-white/95 backdrop-blur text-blue-950 text-xs font-bold px-2.5 py-1 rounded-full shadow-sm">
                        <i class="ri-award-line text-orange-500"></i> {{ $guide->experience }} {{ $guide->experience == 1 ? 'yr' : 'yrs' }}
                    </span>

                    {{-- Name overlaid --}}
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <h3 class="text-white text-base font-semibold drop-shadow-sm">{{ $guide->name }}</h3>
                    </div>
                </div>

                <div class="p-5">
                    {{-- Email --}}
                    <div class="flex items-center gap-1.5 text-sm text-gray-600 mb-2">
                        <i class="ri-mail-line text-orange-400"></i>
                        <span class="truncate">{{ $guide->email }}</span>
                    </div>

                    {{-- Package assigned --}}
                    <div class="mb-3">
                        <span class="inline-flex items-center gap-1 text-xs text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">
                            <i class="ri-suitcase-line"></i>
                            {{ $guide->package->package_name ?? 'Unassigned' }}
                        </span>
                    </div>

                    {{-- Description --}}
                    <p class="text-sm text-gray-500 mb-4 leading-relaxed">
                        {{ Str::limit($guide->description, 90) }}
                    </p>

                    {{-- Footer --}}
                    <div class="flex justify-end items-center pt-3 border-t border-gray-100 gap-2">
                        
                        <a href="{{ route('guides.edit', $guide->id) }}"
                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors duration-150"
                            title="Edit">
                            <i class="ri-edit-line"></i>
                        </a>
                        <button
                            data-action="{{ route('guides.destroy', $guide->id) }}"
                            data-name="{{ $guide->name }}"
                            class="delete-guide-btn w-9 h-9 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-150"
                            title="Delete">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

{{-- Delete Confirmation Modal --}}
<div id="deleteGuideModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex justify-center items-center px-4">
    <div class="bg-white p-8 rounded-2xl max-w-md w-full shadow-xl">
        <div class="flex flex-col items-center text-center mb-6">
            <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-red-100 text-red-600 mb-4">
                <i class="ri-delete-bin-line text-2xl"></i>
            </span>
            <h3 class="text-xl font-bold text-blue-950 mb-2">Delete Guide</h3>
            <p class="text-gray-500 text-sm">
                Are you sure you want to delete
                <span id="deleteGuideName" class="font-semibold text-gray-700"></span>?
                This action cannot be undone.
            </p>
        </div>
        <div class="flex justify-end gap-3">
            <button id="closeDeleteGuideModal" type="button"
                class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors duration-150">
                Cancel
            </button>
            <form id="deleteGuideForm" action="" method="POST" class="inline">
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
        const modal = document.getElementById('deleteGuideModal');
        const closeModalBtn = document.getElementById('closeDeleteGuideModal');
        const deleteButtons = document.querySelectorAll('.delete-guide-btn');
        const deleteForm = document.getElementById('deleteGuideForm');
        const deleteName = document.getElementById('deleteGuideName');

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
