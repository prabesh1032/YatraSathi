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
        <!-- View Available Packages Heading -->
        <div class="text-center text-5xl font-extrabold text-black mt-8">
            <span class="block">
             View Our Available
                <span class="text-yellow-500 underline decoration-wavy">Packages on Map</span>
            </span>
        </div>
        <p class="text-center text-lg text-gray-900 font-extrabold mt-4">
            Discover exciting packages by clicking on the markers! <br /> Your next adventure is just a click away.
        </p>

        <!-- Map Container -->
        <div
            id="map"
            class="mt-6 rounded-xl shadow-2xl  z-0 border-4 border-indigo-600 "
            style="height: 500px; width: 100%;"></div>

        <!-- Button to Explore Packages -->
        <div class="text-center mt-6">
            <a href="{{ route('packages') }}"
                class="inline-block px-8 py-3 bg-yellow-500 text-black font-semibold rounded-lg shadow-lg hover:shadow-xl hover:bg-yellow-300 ">
                <i class="ri-compass-2-line mr-2"></i> Explore Packages
            </a>
        </div>

        <!-- How It Works Section -->
        <div class="mt-16 bg-gray-200 p-10 rounded-lg shadow-2xl">
            <h2 class="text-4xl font-extrabold text-yellow-500 text-center">
                How It Works?
            </h2>
            <p class="text-lg text-indigo-500 font-bold text-center mt-4">
                Use our interactive map to explore destinations and travel packages.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10">
                <!-- Step 1 -->
                <div class="text-center flex flex-col items-center bg-gradient-to-b from-indigo-100 to-blue-200 p-8 rounded-lg shadow-lg transition-all hover:shadow-2xl">
                    <div class="bg-yellow-500 p-4 rounded-full mb-4 animate-pulse">
                        <i class="ri-map-pin-line text-4xl text-black"></i>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-500">Explore Locations</h3>
                    <p class="mt-2 text-indigo-500">
                        Click on any marker to uncover detailed information about travel packages.
                    </p>
                </div>
                <!-- Step 2 -->
                <div class="text-center flex flex-col items-center bg-gradient-to-b from-indigo-100 to-blue-200 p-8 rounded-lg shadow-lg transition-all hover:shadow-2xl">
                    <div class="bg-yellow-500 p-4 rounded-full mb-4 animate-pulse">
                        <i class="ri-information-line text-4xl text-black"></i>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-500">Learn More</h3>
                    <p class="mt-2 text-indigo-500">
                        Explore features, itineraries, and highlights for each package.
                    </p>
                </div>
                <!-- Step 3 -->
                <div class="text-center flex flex-col items-center bg-gradient-to-b from-indigo-100 to-blue-200 p-8 rounded-lg shadow-lg transition-all hover:shadow-2xl">
                    <div class="bg-yellow-500 p-4 rounded-full mb-4 animate-pulse">
                        <i class="ri-rocket-line text-4xl text-black"></i>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-500">Book Your Adventure</h3>
                    <p class="mt-2 text-indigo-500">
                        Ready to travel? Book your dream package directly from the details page.
                    </p>
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
    <button
        onclick="window.location.href='{{ url('/readpackages') }}/${package.id}'"
        class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 px-4 py-2 rounded transition duration-300">
        <i class="ri-eye-line mr-2"></i> View Package Details
    </button>
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
