@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Enhanced Page Header -->
        <div class="text-center mb-12">
            <div class="relative">
                <h1 class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 bg-clip-text text-transparent mb-6">
                    Explore Nepal
                </h1>
                <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-32 h-32 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full opacity-20 animate-pulse"></div>
            </div>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                Discover breathtaking destinations and adventure packages across the majestic landscapes of Nepal
            </p>
            <div class="flex justify-center mt-6">
                <div class="flex items-center space-x-4 bg-white bg-opacity-80 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-full mr-2 animate-bounce"></div>
                        <span class="text-sm font-medium text-gray-700">{{ $destinationsArray->count() }} Destinations</span>
                    </div>
                    <div class="w-px h-4 bg-gray-300"></div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full mr-2 animate-bounce" style="animation-delay: 0.2s"></div>
                        <span class="text-sm font-medium text-gray-700">{{ $packagesArray->count() }} Packages</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Legend -->
        <div class="max-w-2xl mx-auto mb-8">
            <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-2xl shadow-xl p-6 border border-white/20">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Map Legend</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group hover:scale-105 transition-transform duration-300">
                        <div class="bg-gradient-to-r from-indigo-500 to-blue-500 rounded-xl p-4 shadow-lg">
                            <div class="flex items-center">
                                <div class="relative">
                                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md">
                                        <div class="w-4 h-4 bg-indigo-500 rounded-full"></div>
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-white font-bold text-lg">Destinations</h4>
                                    <p class="text-indigo-100 text-sm">Click to explore packages</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group hover:scale-105 transition-transform duration-300">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl p-4 shadow-lg">
                            <div class="flex items-center">
                                <div class="relative">
                                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md">
                                        <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-ping" style="animation-delay: 0.5s"></div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-white font-bold text-lg">Packages</h4>
                                    <p class="text-green-100 text-sm">View detailed information</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Map Container -->
        <div class="relative mb-12">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-gradient-to-r from-indigo-200 to-purple-200 p-2">
                <div class="relative rounded-2xl overflow-hidden">
                    <!-- Map Loading Overlay -->
                    <div id="map-loading" class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center z-50">
                        <div class="text-center text-white">
                            <div class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-white border-t-transparent mb-4"></div>
                            <h3 class="text-xl font-bold">Loading Nepal Map...</h3>
                            <p class="text-indigo-100">Preparing your journey</p>
                        </div>
                    </div>
                    <div id="map" class="w-full relative z-10" style="height: 700px;">
                        <!-- Map controls will be enhanced with custom styling -->
                    </div>
                    <!-- Map Overlay Info -->
                    <div class="absolute top-4 left-4 bg-white bg-opacity-90 backdrop-blur-sm rounded-xl p-4 shadow-lg z-20">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                                <i class="ri-map-pin-line text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Nepal Explorer</h4>
                                <p class="text-sm text-gray-600">Interactive Travel Map</p>
                            </div>
                        </div>
                    </div>
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
    // Hide loading overlay after a short delay
    setTimeout(() => {
        document.getElementById('map-loading').style.display = 'none';
    }, 1500);

    // Nepal boundaries - more restrictive
    const nepalBounds = [
        [26.347, 80.035], // Southwest corner
        [30.422, 88.175]  // Northeast corner
    ];

    // Initialize map with enhanced options
    map = L.map('map', {
        center: [28.3949, 84.1240],
        zoom: 7,
        minZoom: 6,
        maxZoom: 15,
        maxBounds: nepalBounds,
        maxBoundsViscosity: 1.0, // Strong boundary enforcement
        zoomControl: false, // We'll add custom controls
        scrollWheelZoom: true,
        doubleClickZoom: true,
        boxZoom: true,
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

    // Custom enhanced icons with animations
    const destinationIcon = L.divIcon({
        className: 'custom-div-icon destination-marker',
        html: `<div class="marker-container destination-marker-style">
            <div class="marker-pulse"></div>
            <div class="marker-pin">
                <i class="ri-map-pin-fill text-white"></i>
            </div>
        </div>`,
        iconSize: [30, 30],
        iconAnchor: [15, 30],
        popupAnchor: [0, -30]
    });

    const packageIcon = L.divIcon({
        className: 'custom-div-icon package-marker',
        html: `<div class="marker-container package-marker-style">
            <div class="marker-pulse package-pulse"></div>
            <div class="marker-pin package-pin">
                <i class="ri-gift-fill text-white"></i>
            </div>
        </div>`,
        iconSize: [30, 30],
        iconAnchor: [15, 30],
        popupAnchor: [0, -30]
    });

    // Add destination markers with enhanced popups
    const destinations = @json($destinationsArray);
    destinations.forEach(function(destination, index) {
        setTimeout(() => {
            L.marker([destination.latitude, destination.longitude], {
                icon: destinationIcon
            })
            .addTo(map)
            .bindPopup(`
                <div class="enhanced-popup destination-popup">
                    <div class="popup-header">
                        <div class="popup-icon destination-icon">
                            <i class="ri-map-pin-line text-2xl"></i>
                        </div>
                        <h3 class="popup-title">${destination.name}</h3>
                    </div>
                    ${destination.description ? `<p class="popup-description">${destination.description.substring(0, 120)}${destination.description.length > 120 ? '...' : ''}</p>` : ''}
                    <div class="popup-stats">
                        <span class="stat-badge">
                            <i class="ri-gift-line mr-1"></i>
                            ${destination.packages_count} packages
                        </span>
                    </div>
                    <button
                        onclick="window.location.href='{{ route('destinations.show', '') }}/${destination.id}'"
                        class="popup-button destination-button">
                        <i class="ri-arrow-right-circle-line mr-2"></i>
                        Explore Packages
                    </button>
                </div>
            `, {
                maxWidth: 320,
                className: 'enhanced-leaflet-popup'
            });
        }, index * 200); // Staggered animation
    });

    // Add package markers with enhanced popups
    const packages = @json($packagesArray);
    packages.forEach(function(package, index) {
        setTimeout(() => {
            L.marker([package.latitude, package.longitude], {
                icon: packageIcon
            })
            .addTo(map)
            .bindPopup(`
                <div class="enhanced-popup package-popup">
                    <div class="popup-header">
                        <div class="popup-icon package-icon">
                            <i class="ri-gift-line text-2xl"></i>
                        </div>
                        <h3 class="popup-title">${package.name}</h3>
                    </div>
                    <div class="popup-details">
                        <div class="detail-item">
                            <i class="ri-map-pin-2-line text-gray-400"></i>
                            <span>${package.destination}</span>
                        </div>
                        <div class="detail-item">
                            <i class="ri-time-line text-gray-400"></i>
                            <span>${package.duration} days</span>
                        </div>
                        <div class="detail-item price-item">
                            <i class="ri-price-tag-3-line text-green-500"></i>
                            <span class="price">$${package.price}</span>
                        </div>
                    </div>
                    <button
                        onclick="window.location.href='{{ route('packages.read', '') }}/${package.id}'"
                        class="popup-button package-button">
                        <i class="ri-eye-line mr-2"></i>
                        View Details
                    </button>
                </div>
            `, {
                maxWidth: 320,
                className: 'enhanced-leaflet-popup'
            });
        }, (destinations.length * 200) + (index * 150)); // Start after destinations
    });

    // Enhanced map event handlers
    map.on('zoomend', function() {
        const zoom = map.getZoom();
        const markers = document.querySelectorAll('.marker-container');
        markers.forEach(marker => {
            marker.style.transform = `scale(${Math.min(1.2, 0.5 + zoom * 0.1)})`;
        });
    });

    map.on('moveend', function() {
        // Ensure map stays within Nepal bounds
        if (!nepalBounds.some(bound => map.getBounds().contains(bound))) {
            map.fitBounds(nepalBounds);
        }
    });
}

// Initialize map when page loads
document.addEventListener('DOMContentLoaded', initMap);
</script>

<style>
/* Enhanced marker styles */
.custom-div-icon {
    background: transparent !important;
    border: none !important;
}

.marker-container {
    position: relative;
    transition: all 0.3s ease;
}

.destination-marker-style .marker-pin {
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #4F46E5, #3B82F6);
    border-radius: 50% 50% 50% 0;
    transform: rotate(-45deg);
    border: 3px solid white;
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.destination-marker-style .marker-pin i {
    transform: rotate(45deg);
    font-size: 16px;
}

.package-marker-style .marker-pin {
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #059669, #10B981);
    border-radius: 50% 50% 50% 0;
    transform: rotate(-45deg);
    border: 3px solid white;
    box-shadow: 0 4px 12px rgba(5, 150, 105, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.package-marker-style .marker-pin i {
    transform: rotate(45deg);
    font-size: 14px;
}

.marker-pulse {
    position: absolute;
    width: 30px;
    height: 30px;
    background: rgba(79, 70, 229, 0.3);
    border-radius: 50%;
    animation: pulse 2s infinite;
    z-index: 1;
}

.package-pulse {
    background: rgba(5, 150, 105, 0.3) !important;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(2.5);
        opacity: 0;
    }
}

/* Enhanced popup styles */
.enhanced-leaflet-popup .leaflet-popup-content-wrapper {
    background: white;
    border-radius: 16px !important;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
    border: 1px solid rgba(0, 0, 0, 0.05);
    padding: 0 !important;
}

.enhanced-leaflet-popup .leaflet-popup-content {
    margin: 0 !important;
    padding: 0 !important;
    width: auto !important;
}

.enhanced-popup {
    padding: 20px;
    font-family: inherit;
}

.popup-header {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
}

.popup-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    color: white;
}

.destination-icon {
    background: linear-gradient(135deg, #4F46E5, #3B82F6);
}

.package-icon {
    background: linear-gradient(135deg, #059669, #10B981);
}

.popup-title {
    font-size: 18px;
    font-weight: 700;
    color: #1F2937;
    margin: 0;
    line-height: 1.2;
}

.popup-description {
    color: #6B7280;
    font-size: 14px;
    line-height: 1.4;
    margin-bottom: 16px;
}

.popup-details {
    margin-bottom: 16px;
}

.detail-item {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 14px;
    color: #4B5563;
}

.detail-item i {
    margin-right: 8px;
    width: 16px;
}

.price-item .price {
    font-weight: 700;
    color: #059669;
    font-size: 16px;
}

.popup-stats {
    margin-bottom: 16px;
}

.stat-badge {
    display: inline-flex;
    align-items: center;
    background: #F3F4F6;
    color: #374151;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.popup-button {
    width: 100%;
    background: linear-gradient(135deg, #4F46E5, #3B82F6);
    color: white;
    border: none;
    padding: 12px 16px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.package-button {
    background: linear-gradient(135deg, #059669, #10B981);
}

.popup-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Custom zoom control styling */
.leaflet-control-zoom {
    border: none !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
    border-radius: 12px !important;
    overflow: hidden;
}

.leaflet-control-zoom a {
    background: white !important;
    color: #374151 !important;
    border: none !important;
    width: 40px !important;
    height: 40px !important;
    line-height: 40px !important;
    font-size: 18px !important;
    font-weight: bold !important;
    transition: all 0.2s ease !important;
}

.leaflet-control-zoom a:hover {
    background: #F9FAFB !important;
    color: #1F2937 !important;
    transform: scale(1.05);
}

/* Enhanced map container */
#map {
    border-radius: 16px;
    overflow: hidden;
}

.leaflet-container {
    font-family: inherit;
}

/* Loading animation */
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .marker-container {
        transform: scale(0.8);
    }

    .enhanced-popup {
        padding: 16px;
    }

    .popup-title {
        font-size: 16px;
    }
}
</style>
@endsection
