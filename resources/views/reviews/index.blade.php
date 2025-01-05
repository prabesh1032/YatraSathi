@extends('layouts.app')
@section('title', 'Reviews')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-6xl font-extrabold text-center text-gray-900 mb-8">Manage Reviews</h1>

    <!-- Reviews Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($reviews as $review)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col justify-between hover:scale-105 hover:shadow-2xl transition-transform duration-300">
            <!-- Header -->
            <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold text-lg">
                {{ $review->package->name }}
            </div>

            <!-- Body -->
            <div class="p-6 flex-1">
                <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $review->user->name }}</h2>
                <div class="flex items-center mb-4">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.562 4.816a1 1 0 00.95.691h5.045c.969 0 1.371 1.24.588 1.81l-4.09 2.968a1 1 0 00-.364 1.118l1.562 4.816c.3.921-.755 1.688-1.54 1.118l-4.09-2.968a1 1 0 00-1.176 0l-4.09 2.968c-.785.57-1.84-.197-1.54-1.118l1.562-4.816a1 1 0 00-.364-1.118L2.5 9.444c-.783-.57-.38-1.81.588-1.81h5.045a1 1 0 00.95-.691L9.049 2.927z" />
                        </svg>
                    @endfor
                </div>
                <p class="text-gray-600 mb-4">{{ $review->review }}</p>
                <p class="text-sm text-gray-500">Reviewed on {{ $review->created_at->format('d M, Y') }}</p>
            </div>

            <!-- Footer -->
            <div class="p-6 bg-gray-100 flex justify-end">
                <button onclick="showModal('{{ $review->id }}')" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition-colors">
                    Delete
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-gray-500">
            No reviews available.
        </div>
        @endforelse
    </div>
    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $reviews->links('pagination::tailwind') }}
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
        <p class="text-gray-600 text-center mb-6">Are you sure you want to remove this Review? This action cannot be undone.</p>
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
    function showModal(reviewId) {
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/review/${reviewId}/destroy`;
        deleteModal.classList.remove('hidden');
    }

    function hideModal() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.classList.add('hidden');
    }
</script>
@endsection
