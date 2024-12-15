@extends('layouts.app')
@section('title', 'Reviews')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-8">Manage Reviews</h1>

    <!-- Reviews Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-lg font-semibold">
            All Reviews
        </div>
        <table class="min-w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 border-b-2 text-left font-semibold text-gray-600">#</th>
                    <th class="px-6 py-3 border-b-2 text-left font-semibold text-gray-600">Package Name</th>
                    <th class="px-6 py-3 border-b-2 text-left font-semibold text-gray-600">Reviewer</th>
                    <th class="px-6 py-3 border-b-2 text-left font-semibold text-gray-600">Rating</th>
                    <th class="px-6 py-3 border-b-2 text-left font-semibold text-gray-600">Review</th>
                    <th class="px-6 py-3 border-b-2 text-left font-semibold text-gray-600">Date</th>
                    <th class="px-6 py-3 border-b-2 text-center font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                <tr class="hover:bg-blue-50 transition-colors">
                    <td class="px-6 py-4 border-b text-gray-700">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 border-b text-gray-700 font-medium">{{ $review->package->name }}</td>
                    <td class="px-6 py-4 border-b text-gray-700">{{ $review->user->name }}</td>
                    <td class="px-6 py-4 border-b text-gray-700">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.562 4.816a1 1 0 00.95.691h5.045c.969 0 1.371 1.24.588 1.81l-4.09 2.968a1 1 0
                                    00-.364 1.118l1.562 4.816c.3.921-.755 1.688-1.54 1.118l-4.09-2.968a1 1 0 00-1.176 0l-4.09 2.968c-.785.57-1.84-.197-1.54-1.118l1.562-4.816a1 1
                                     0 00-.364-1.118L2.5 9.444c-.783-.57-.38-1.81.588-1.81h5.045a1 1 0 00.95-.691L9.049 2.927z" />
                                </svg>
                            @endfor
                        </div>
                    </td>

                    <td class="px-6 py-4 border-b text-gray-700">{{ $review->review }}</td>
                    <td class="px-6 py-4 border-b text-gray-500">{{ $review->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 border-b text-center">
                        <!-- Delete Button -->
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition-colors">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">No reviews available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $reviews->links('pagination::tailwind') }}
    </div>
</div>
@endsection
