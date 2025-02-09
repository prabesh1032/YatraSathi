@extends('layouts.app')

@section('title', 'Admin Notifications')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Admin Notifications</h2>
    <div class="overflow-hidden rounded-lg shadow-lg border border-gray-200">
        <table class="min-w-full table-auto bg-white">
            <thead>
                <tr class="bg-green-500 text-white">
                    <th class="px-4 py-2 text-left">SN</th>
                    <th class="px-4 py-2 text-left">Type</th>
                    <th class="px-4 py-2 text-left">Content</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notifications as $notification)
                    <tr class="{{ $notification->is_read ? 'bg-gray-100' : 'bg-gray-200' }} transition">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ ucfirst($notification->type) }}</td>
                        <td class="px-4 py-2">{{ $notification->content }}</td>
                        <td class="px-4 py-2">{{ $notification->created_at->format('d M Y, h:i A') }}</td>
                        <td class="px-4 py-2 text-center">
                            @if(!$notification->is_read)
                                <form action="{{ route('markAsRead', $notification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-blue-500 hover:text-blue-700 font-bold">
                                        Mark as Read
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-500">Read</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                            No notifications available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
