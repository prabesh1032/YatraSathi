@extends('layouts.app')
@section('title', 'Travellers')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Traveller Details</h1>

    @if ($travellers->count() > 0)
        <table class="w-full border-collapse border border-gray-300 shadow-lg rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-800">
                    <th class="p-3 text-left border border-gray-300">Name</th>
                    <th class="p-3 text-left border border-gray-300">Email</th>
                    <th class="p-3 text-left border border-gray-300">Package Booked</th>
                    <th class="p-3 text-left border border-gray-300">Travel Date</th>
                    <th class="p-3 text-left border border-gray-300">Review</th>
                    <th class="p-3 text-left border border-gray-300">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($travellers as $traveller)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3 border border-gray-300">{{ $traveller->name }}</td>
                        <td class="p-3 border border-gray-300">{{ $traveller->email }}</td>
                        <td class="p-3 border border-gray-300">
                            {{ $traveller->package->name ?? 'N/A' }}
                        </td>
                        <td class="p-3 border border-gray-300">
                            {{ $traveller->travel_date ?? 'Not Set' }}
                        </td>
                        <td class="p-3 border border-gray-300">
                            {{ $traveller->review ?? 'No Review' }}
                        </td>
                        <td class="p-3 border border-gray-300">
                            @if ($traveller->payment_status === 'paid')
                                <span class="text-green-600 font-bold">Paid</span>
                            @else
                                <span class="text-red-600 font-bold">Pending</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-700 bg-yellow-100 p-4 rounded-lg border-l-4 border-yellow-400">
            No travellers with orders found.
        </p>
    @endif
</div>
@endsection
