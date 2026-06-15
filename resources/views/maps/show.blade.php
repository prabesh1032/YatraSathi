@extends('layouts.master')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <header class="relative w-full bg-cover bg-center overflow-hidden"
            style="height: 280px; background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
            <div class="absolute inset-0"
                style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);">
            </div>
            <div class="relative h-full flex flex-col justify-center items-center text-center px-4">
                <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    ✦ YatraSathi
                </span>
                <h1 class="text-white font-semibold leading-tight mb-3"
                    style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
                    Adventure Map
                </h1>
                <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    Navigate Nepal's destinations and packages with one interactive map.
                </p>
            </div>
        </header>
        <!-- Legend Section - YatraSathi Theme -->
        <div class="max-w-2xl mx-auto mb-8 mt-8">
            <div class=" overflow-hidden">
                <div class="p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Destinations -->
                        <div class="flex items-center gap-4 p-3 rounded-xl transition-all hover:shadow-md"
                            style="background: linear-gradient(135deg, #eef2ff 0%, #ffffff 100%); border-left: 3px solid #3b82f6;">
                            <div class="relative">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800"
                                    style="font-family: 'DM Serif Display', Georgia, serif;">Destinations</h4>
                                <p class="text-gray-500 text-sm" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    Click to explore packages</p>
                            </div>
                        </div>

                        <!-- Packages -->
                        <div class="flex items-center gap-4 p-3 rounded-xl transition-all hover:shadow-md"
                            style="background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 100%); border-left: 3px solid #10b981;">
                            <div class="relative">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800"
                                    style="font-family: 'DM Serif Display', Georgia, serif;">Packages</h4>
                                <p class="text-gray-500 text-sm" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    View detailed information</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Container -->
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-lg shadow border-2 border-gray-200 overflow-hidden mx-4 max-w-6xl w-full">
                <div id="map" class="w-full"
                    style="height: 500px; margin: 20px; border-radius: 8px; border: 1px solid #e5e7eb; z-index: 10; position: relative;">
                    <!-- Map will be loaded here -->
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
                [30.422, 88.175] // Northeast corner
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
