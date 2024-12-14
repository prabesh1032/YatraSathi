@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-blue-700 mb-8">Manage Reviews</h1>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-blue-100 text-blue-700">
                    <th class="px-6 py-3 border-b text-left">#</th>
                    <th class="px-6 py-3 border-b text-left">Package Name</th>
                    <th class="px-6 py-3 border-b text-left">Reviewer</th>
                    <th class="px-6 py-3 border-b text-left">Rating</th>
                    <th class="px-6 py-3 border-b text-left">Review</th>
                    <th class="px-6 py-3 border-b text-left">Date</th>
                    <th class="px-6 py-3 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 border-b">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 border-b">{{ $review->package->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $review->user->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $review->rating }} / 5</td>
                    <td class="px-6 py-4 border-b">{{ $review->review }}</td>
                    <td class="px-6 py-4 border-b">{{ $review->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 border-b text-center">
                        <!-- Delete Button -->
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
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

    <div class="mt-6">
        {{ $reviews->links() }}
    </div>
</div>
@endsection
