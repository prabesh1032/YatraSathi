@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Planning</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Add Remix Icon CDN -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-900">

    <div class="container mx-auto p-8">
        <!-- View Available Packages heading -->
        <div class="text-center text-5xl font-extrabold text-gray-900 mt-8">
            <span class="block">
                <i class="ri-map-pin-line text-red-600 text-6xl"></i> View Our Available
                <span class="text-yellow-500">Packages on Map</span>
            </span>
        </div>
        <p class="text-center text-xl text-indigo-700 font-extrabold mt-4">
            Explore exciting packages by clicking on the markers! Your adventure starts here.
        </p>

        <!-- Map Container -->
        <div id="map" class="mt-6 rounded-xl z-0 shadow-lg border-4 border-blue-600" style="height: 500px; width: 100%;"></div>

        <!-- Button to explore packages -->
        <div class="text-center mt-6">
            <a href="{{route('packages')}}" class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                <i class="ri-compass-2-line mr-2"></i> Explore Packages
            </a>
        </div>

        <!-- How It Works Section -->
        <div class="mt-16 bg-gray-50 p-10 rounded-lg shadow-lg">
        <h2 class="text-4xl font-bold text-indigo-800 text-center">How It Works?</h2>
            <p class="text-lg text-gray-900 font-bold text-center mt-4">
                Our map offers a seamless way to explore the best travel packages. Click on any of the markers to learn more about exciting destinations and unique adventures.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
        <!-- Step 1 -->
        <div class="text-center flex flex-col items-center bg-indigo-50 p-6 rounded-lg shadow-sm">
            <div class="bg-blue-100 p-4 rounded-full mb-4">
                <i class="ri-map-pin-line text-4xl text-indigo-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-indigo-800 mt-2">Explore Locations</h3>
            <p class="mt-2 text-gray-600">Click on a location on the map to view detailed information about travel packages.</p>
        </div>
        <!-- Step 2 -->
        <div class="text-center flex flex-col items-center bg-indigo-50 p-6 rounded-lg shadow-sm ">
            <div class="bg-blue-100 p-4 rounded-full mb-4">
                <i class="ri-information-line text-4xl text-indigo-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-indigo-800 mt-2">Learn More</h3>
            <p class="mt-2 text-gray-600">Discover the features, benefits, and itineraries for each package.</p>
        </div>
        <!-- Step 3 -->
        <div class="text-center flex flex-col items-center bg-indigo-50 p-6 rounded-lg shadow-sm ">
            <div class="bg-blue-100 p-4 rounded-full mb-4">
                <i class="ri-rocket-line text-4xl text-indigo-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-indigo-800 mt-2">Book Your Adventure</h3>
            <p class="mt-2 text-gray-600">Ready to travel? Book your dream package directly from the details page.</p>
        </div>
    </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
    let map;

    function initMap() {
        // Set map view to Nepal's coordinates
        map = L.map('map', {
            center: [28.3949, 84.1240],
            zoom: 7,
            minZoom: 7,
            maxZoom: 18,
            maxBounds: [
                [26.347, 80.035], // Southwest corner of Nepal
                [30.422, 88.175]  // Northeast corner of Nepal
            ],
            maxBoundsViscosity: 1.0
        });

        // Add OpenStreetMap tiles with smooth zoom animation
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Package data passed from the controller
        const packageLocations = @json($packagesArray); // Pass the packages array as JSON

        // Define custom icon for the markers
        const customIcon = L.icon({
            iconUrl: '{{ asset('redlocation.png') }}',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        // Add markers for each package location with animation
        packageLocations.forEach(function(package) {
            // Create custom markers with clickable links
            L.marker([package.latitude, package.longitude], { icon: customIcon })
                .addTo(map)
                .bindPopup(`
                    <div class="p-4">
                        <strong class="text-xl text-blue-800">${package.name}</strong><br>
                        <a href="{{ url('/readpackages') }}/${package.id}" class="text-blue-600 underline hover:text-blue-800 transition duration-300">
                            <i class="ri-eye-line mr-2"></i> View Package Details
                        </a>
                    </div>
                `);
        });
    }

    // Initialize the map when the page loads
    window.onload = initMap;
</script>

</body>

</html>
@endsection
