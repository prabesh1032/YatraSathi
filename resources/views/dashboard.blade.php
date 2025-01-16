@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Packages Card -->
    <div class="bg-gradient-to-r from-purple-400 to-pink-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Packages</h2>
            <i class="ri-suitcase-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">Create and manage travel packages for customers.</p>
        <a href="{{ route('packages.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-300 text-center transition-all">Manage Packages</a>
    </div>

    <!-- Bookings Card -->
    <div class="bg-gradient-to-r from-blue-400 to-teal-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Bookings</h2>
            <i class="ri-book-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">View and manage customer bookings.</p>
        <a href="{{ route('packages.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-300 text-center transition-all">Manage Bookings</a>
    </div>

    <!-- Reviews Card -->
    <div class="bg-gradient-to-r from-red-400 to-pink-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Reviews</h2>
            <i class="ri-star-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">Read and respond to customer reviews.</p>
        <a href="{{ route('reviews.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-300 text-center transition-all">Manage Reviews</a>
    </div>

    <!-- Travellers Card -->
    <div class="bg-gradient-to-r from-blue-400 to-purple-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Travellers</h2>
            <i class="ri-user-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">Manage traveller accounts and roles.</p>
        <a href="{{ route('travellers.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-300 text-center transition-all">View Travellers</a>
    </div>

    <!-- Messages Card -->
    <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg shadow-lg transform transition-all hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">Messages</h2>
            <i class="ri-message-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm">View message of customer inquiries.</p>
        <a href="{{ route('messages.index') }}" class="mt-4 block px-4 py-2 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-300 text-center transition-all">View Messages</a>
    </div>
</div>

<h3 class="text-4xl font-extrabold text-left text-gray-900 py-5">
    <i class="ri-pie-chart-line text-4xl text-gray-700 mb-2"></i>Pie Chart of Travellers per package
</h3>
<div class="flex">
    <div class="bg-white p-6 rounded-lg shadow-md w-full">
        <canvas id="myChart" class="rounded-lg" style="max-width: 100%; height: 500px;"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
    const ctx = document.getElementById('myChart').getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($packageNames) !!}, // Ensure this variable is passed correctly
            datasets: [{
                label: 'No of user per package',
                data: {!! json_encode($userCounts) !!},
                backgroundColor: Array.from({ length: {!! json_encode($packageNames) !!}.length }, getRandomColor),
                borderWidth: 2,
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Ensures the chart is scalable
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        font: {
                            size: 14
                        },
                        color: '#333'
                    }
                },
                title: {
                    display: false,
                    text: 'Packages',
                    font: {
                        size: 19
                    },
                    color: '#444',
                    padding: {
                        top: 0,
                        bottom: 20
                    }
                }
            }
        }
    });
</script>
<!-- Recent Activities Section -->

@endsection
