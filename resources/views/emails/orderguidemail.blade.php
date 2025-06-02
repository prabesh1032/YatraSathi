<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 mt-8">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-center py-6">
            <div class="flex justify-center items-center space-x-3">
                <i class="ri-map-pin-line text-4xl"></i>
                <h1 class="text-3xl font-bold">YatraSathi</h1>
            </div>
            <p class="text-sm mt-2">Your Trusted Travel Companion</p>
        </div>
        <p class="text-sm opacity-90">You have been selected for a new adventure!</p>
        <div class="p-8">
            <p class="text-lg mb-6">Hello, <span class="font-semibold">{{ $guide->name }}</span>,</p>

            <p class="text-gray-700 leading-relaxed mb-6">
                Congratulations! You have been assigned as the guide for a new booking. Below are the details for your reference:
            </p>

            <div class="bg-blue-50 p-4 rounded-md mb-6">
                <h2 class="text-lg font-semibold text-blue-600 mb-3">Package Details</h2>
                <ul class="space-y-2 text-gray-800">
                    <li><span class="font-semibold">Package Name:</span> {{ $packageName }}</li>
                    <li><span class="font-semibold">Travel Date:</span> {{ $travelDate }}</li>
                    <li><span class="font-semibold">Number of People:</span> {{ $numPeople }}</li>
                    <li><span class="font-semibold">Total Price:</span> ${{ number_format((float) $order->total_price, 2) }}</li>
                </ul>
            </div>

            <div class="bg-green-50 p-4 rounded-md mb-6">
                <h2 class="text-lg font-semibold text-green-600 mb-3">User Details</h2>
                <ul class="space-y-2 text-gray-800">
                    <li><span class="font-semibold">Name:</span> {{ $userName }}</li>
                    <li><span class="font-semibold">Phone:</span> {{ $userPhone }}</li>
                    <li><span class="font-semibold">Address:</span> {{ $userAddress }}</li>
                </ul>
            </div>

            <p class="text-gray-700 leading-relaxed mb-6">
                Please contact the user at your earliest convenience to confirm the booking details and coordinate further.
            </p>

            <p class="text-sm text-gray-500">
                If you have any questions or need assistance, feel free to reach out to our team.
            </p>
        </div>
        <div class="bg-gray-100 text-center py-4 border-t border-gray-200">
            <p class="text-gray-600 text-sm">
                Thank you for your continued partnership with <span class="font-semibold">YatraSathi</span>.
            </p>
            <p class="text-gray-500 text-xs mt-1">© 2025 YatraSathi. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
