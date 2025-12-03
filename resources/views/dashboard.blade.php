@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10 mb-12">

    <!-- Destinations Card -->
    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-white">Destinations</h2>
            <i class="ri-map-pin-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm mb-6">Manage travel destinations and locations.</p>
        <a href="{{ route('destinations.index') }}" class="block w-full text-center py-2 rounded-full bg-yellow-400 text-black font-bold hover:bg-yellow-300 transition-all">
            Manage Destinations
        </a>
        <div class="absolute bottom-0 right-0 opacity-10 text-white text-[8rem]">
            <i class="ri-map-pin-line"></i>
        </div>
    </div>

    <!-- Packages Card -->
    <div class="bg-gradient-to-r from-indigo-500 to-pink-500 p-6 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-white">Packages</h2>
            <i class="ri-suitcase-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm mb-6">Create and manage travel packages.</p>
        <a href="{{ route('packages.index') }}" class="block w-full text-center py-2 rounded-full bg-yellow-400 text-black font-bold hover:bg-yellow-300 transition-all">
            Manage Packages
        </a>
        <div class="absolute bottom-0 right-0 opacity-10 text-white text-[8rem]">
            <i class="ri-suitcase-line"></i>
        </div>
    </div>

    <!-- Guides Card -->
    <div class="bg-gradient-to-r from-teal-500 to-cyan-600 p-6 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-white">Guides</h2>
            <i class="ri-user-heart-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm mb-6">Manage guide accounts and details.</p>
        <a href="{{ route('guides.index') }}" class="block w-full text-center py-2 rounded-full bg-yellow-400 text-black font-bold hover:bg-yellow-300 transition-all">
            View Guides
        </a>
        <div class="absolute bottom-0 right-0 opacity-10 text-white text-[8rem]">
            <i class="ri-user-heart-line"></i>
        </div>
    </div>

    <!-- Bookings Card -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-white">Bookings</h2>
            <i class="ri-book-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm mb-6">View and manage customer bookings.</p>
        <a href="{{ route('orders.index') }}" class="block w-full text-center py-2 rounded-full bg-yellow-400 text-black font-bold hover:bg-yellow-300 transition-all">
            Manage Bookings
        </a>
        <div class="absolute bottom-0 right-0 opacity-10 text-white text-[8rem]">
            <i class="ri-book-line"></i>
        </div>
    </div>

    <!-- Reviews Card -->
    <div class="bg-gradient-to-r from-cyan-400 to-lime-500 p-6 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-white">Reviews</h2>
            <i class="ri-star-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm mb-6">Read and respond to customer reviews.</p>
        <a href="{{ route('reviews.index') }}" class="block w-full text-center py-2 rounded-full bg-yellow-400 text-black font-bold hover:bg-yellow-300 transition-all">
            Manage Reviews
        </a>
        <div class="absolute bottom-0 right-0 opacity-10 text-white text-[8rem]">
            <i class="ri-star-line"></i>
        </div>
    </div>

    <!-- Travellers Card -->
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-white">Travellers</h2>
            <i class="ri-user-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm mb-6">Manage traveller accounts and roles.</p>
        <a href="{{ route('travellers.index') }}" class="block w-full text-center py-2 rounded-full bg-yellow-400 text-black font-bold hover:bg-yellow-300 transition-all">
            View Travellers
        </a>
        <div class="absolute bottom-0 right-0 opacity-10 text-white text-[8rem]">
            <i class="ri-user-line"></i>
        </div>
    </div>

    <!-- Messages Card -->
    <div class="bg-gradient-to-r from-red-500 to-pink-600 p-6 rounded-3xl shadow-2xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-white">Messages</h2>
            <i class="ri-message-line text-4xl text-white"></i>
        </div>
        <p class="text-white text-sm mb-6">View messages of customer inquiries.</p>
        <a href="{{ route('messages.index') }}" class="block w-full text-center py-2 rounded-full bg-yellow-400 text-black font-bold hover:bg-yellow-300 transition-all">
            View Messages
        </a>
        <div class="absolute bottom-0 right-0 opacity-10 text-white text-[8rem]">
            <i class="ri-message-line"></i>
        </div>
    </div>

</div>

<!-- Pie Chart Section -->
<h3 class="text-3xl font-bold text-center text-gray-900 py-8">
    <span class="inline-flex items-center px-4 py-2 rounded-full bg-yellow-200 text-yellow-800">
        <i class="ri-pie-chart-line text-3xl mr-2"></i> Travellers per Package
    </span>
</h3>

<div class="flex justify-center">
    <div class="bg-gradient-to-br from-cyan-100 to-white p-8 rounded-3xl shadow-2xl w-full max-w-2xl">
        <canvas id="myChart" class="rounded-lg" style="max-width: 100%; height: 350px;"></canvas>
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
