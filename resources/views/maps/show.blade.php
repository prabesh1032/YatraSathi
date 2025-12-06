@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                Explore Nepal
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Discover breathtaking destinations and adventure packages across Nepal
            </p>
            <div class="flex justify-center mt-4">
                <div class="flex items-center space-x-4 bg-white rounded px-4 py-2 shadow">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                        <span class="text-sm text-gray-700">{{ $destinationsArray->count() }} Destinations</span>
                    </div>
                    <div class="w-px h-4 bg-gray-300"></div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                        <span class="text-sm text-gray-700">{{ $packagesArray->count() }} Packages</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Legend -->
        <div class="max-w-xl mx-auto mb-6">
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-lg font-bold text-gray-800 mb-4 text-center">Map Legend</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-500 rounded p-3">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-white font-bold">Destinations</h4>
                                <p class="text-blue-100 text-sm">Click to explore packages</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-500 rounded p-3">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-white font-bold">Packages</h4>
                                <p class="text-green-100 text-sm">View detailed information</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Container -->
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-lg shadow border-2 border-gray-200 overflow-hidden mx-4 max-w-6xl w-full">
                <div id="map" class="w-full" style="height: 500px; margin: 20px; border-radius: 8px; border: 1px solid #e5e7eb; z-index: 10; position: relative;">
                    <!-- Map will be loaded here -->
                </div>
            </div>
        </div>

        <!-- Enhanced How It Works Section -->
        <div class="bg-gradient-to-r from-indigo-900 via-purple-900 to-blue-900 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-20 h-20 border border-white rounded-full"></div>
                <div class="absolute top-32 right-20 w-16 h-16 border border-white rounded-full"></div>
                <div class="absolute bottom-20 left-32 w-12 h-12 border border-white rounded-full"></div>
            </div>

            <div class="relative z-10">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-white mb-8">
                    How to Navigate
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="group">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8 hover:bg-opacity-20 transition-all duration-300 hover:scale-105 border border-white/10">
                            <div class="flex justify-center mb-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-indigo-400 to-blue-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                                    <i class="ri-map-pin-line text-3xl text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4 text-center">Find Destinations</h3>
                            <p class="text-indigo-100 text-center leading-relaxed">
                                Discover blue markers scattered across Nepal's most beautiful regions. Each destination offers unique experiences and packages.
                            </p>
                        </div>
                    </div>
                    <div class="group">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8 hover:bg-opacity-20 transition-all duration-300 hover:scale-105 border border-white/10">
                            <div class="flex justify-center mb-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                                    <i class="ri-gift-line text-3xl text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4 text-center">Explore Packages</h3>
                            <p class="text-indigo-100 text-center leading-relaxed">
                                Green markers represent individual adventure packages. Click to view detailed itineraries, pricing, and booking options.
                            </p>
                        </div>
                    </div>
                    <div class="group">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8 hover:bg-opacity-20 transition-all duration-300 hover:scale-105 border border-white/10">
                            <div class="flex justify-center mb-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                                    <i class="ri-rocket-line text-3xl text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4 text-center">Book Your Journey</h3>
                            <p class="text-indigo-100 text-center leading-relaxed">
                                Found your perfect adventure? Click through to detailed package information and secure your booking with trusted guides.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
let map;

function initMap() {
    // Nepal boundaries - more restrictive
    const nepalBounds = [
        [26.347, 80.035], // Southwest corner
        [30.422, 88.175]  // Northeast corner
    ];

    // Initialize map with better zoom settings
    map = L.map('map', {
        center: [28.3949, 84.1240],
        zoom: 7,
        minZoom: 7,
        maxZoom: 12,
        maxBounds: nepalBounds,
        maxBoundsViscosity: 1.0,
        zoomControl: false,
        scrollWheelZoom: true,
        doubleClickZoom: true,
        boxZoom: false,
        keyboard: true,
        dragging: true,
        touchZoom: true,
        bounceAtZoomLimits: true
    });

    // Add custom zoom control with better positioning
    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);

    // Enhanced map tiles with better styling
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        maxZoom: 15,
        subdomains: 'abcd'
    }).addTo(map);

    // Custom icons
    const destinationIcon = L.divIcon({
        className: 'custom-div-icon destination-marker',
        html: `<div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
            <i class="ri-map-pin-fill text-white text-sm"></i>
        </div>`,
        iconSize: [24, 24],
        iconAnchor: [12, 24],
        popupAnchor: [0, -24]
    });

    const packageIcon = L.divIcon({
        className: 'custom-div-icon package-marker',
        html: `<div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
            <i class="ri-gift-fill text-white text-sm"></i>
        </div>`,
        iconSize: [24, 24],
        iconAnchor: [12, 24],
        popupAnchor: [0, -24]
    });

    // Add destination markers
    const destinations = @json($destinationsArray);
    destinations.forEach(function(destination) {
        L.marker([destination.latitude, destination.longitude], {
            icon: destinationIcon
        })
        .addTo(map)
        .bindPopup(`
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">${destination.name}</h3>
                ${destination.description ? `<p class="text-gray-600 mb-3">${destination.description.substring(0, 100)}${destination.description.length > 100 ? '...' : ''}</p>` : ''}
                <div class="mb-3">
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                        ${destination.packages_count} packages
                    </span>
                </div>
                <button
                    onclick="window.location.href='{{ route('destinations.show', '') }}/${destination.id}'"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Explore Packages
                </button>
            </div>
        `);
    });

    // Add package markers
    const packages = @json($packagesArray);
    packages.forEach(function(package) {
        L.marker([package.latitude, package.longitude], {
            icon: packageIcon
        })
        .addTo(map)
        .bindPopup(`
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">${package.name}</h3>
                <div class="space-y-2 mb-3">
                    <div class="text-gray-600">
                        <i class="ri-map-pin-2-line mr-1"></i>
                        ${package.destination}
                    </div>
                    <div class="text-gray-600">
                        <i class="ri-time-line mr-1"></i>
                        ${package.duration} days
                    </div>
                    <div class="text-green-600 font-bold">
                        <i class="ri-price-tag-3-line mr-1"></i>
                        $${package.price}
                    </div>
                </div>
                <button
                    onclick="window.location.href='{{ route('packages.read', '') }}/${package.id}'"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    View Details
                </button>
            </div>
        `);
    });

}

// Initialize map when page loads
document.addEventListener('DOMContentLoaded', initMap);
</script>

@endsection
