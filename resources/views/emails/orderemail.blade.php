<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden mt-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-center py-6">
            <div class="flex justify-center items-center space-x-3">
                <i class="ri-map-pin-line text-4xl"></i>
                <h1 class="text-3xl font-bold">YatraSathi</h1>
            </div>
            <p class="text-sm mt-2">Your Trusted Travel Companion</p>
        </div>

        <!-- Main Content -->
        <div class="p-8">
            <p class="text-lg font-semibold text-gray-700 mb-4">Dear {{ $name }},</p>
            <p class="text-gray-600 leading-relaxed mb-6">
                We are thrilled to inform you that your booking status is now
                <span class="font-bold text-blue-600">{{ $status }}</span>. Thank you for choosing YatraSathi for your travel needs!
            </p>

            <hr class="border-gray-300 my-6">

            <!-- Order Details -->
            <h2 class="text-xl font-semibold text-blue-600 mb-4">
                <i class="ri-file-list-line align-middle text-lg"></i> Order Details
            </h2>
            <ul class="space-y-3 text-gray-700">
                <li><strong>Package Name:</strong> {{ $package->name }}</li>
                {{-- <li><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</li> --}}
                <li><strong>Number of Travelers:</strong> {{ $order->num_people }}</li>
                <li><strong>Duration:</strong> {{ $package->duration }} Days</li>
                <li><strong>Traveling On:</strong> {{ \Carbon\Carbon::parse($order->travel_date)->format('d M Y') }}</li>
                <li><strong>Payment Method:</strong> {{ $order->payment_method }}</li>
            </ul>

            <hr class="border-gray-300 my-6">

            <p class="text-gray-600 leading-relaxed">
                If you have any questions or require further assistance, feel free to contact our support team at
                <a href="mailto:support@yatrasathi.com" class="text-blue-600 hover:underline">support@yatrasathi.com</a>.
            </p>

            <div class="text-center mt-8">
                <a href="{{ route('home') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md text-lg font-semibold shadow hover:bg-blue-700 transition">
                    <i class="ri-compass-line align-middle mr-2"></i> Explore More Packages
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 text-center py-4 border-t border-gray-300">
            <p class="text-gray-600 text-sm">
                © 2025 YatraSathi. All rights reserved.
            </p>
            <div class="flex justify-center space-x-4 mt-2">
                <a href="https://twitter.com/yatrasathi" class="text-blue-600 hover:underline">
                    <i class="ri-twitter-line text-lg"></i> Twitter
                </a>
                <a href="https://facebook.com/yatrasathi" class="text-blue-600 hover:underline">
                    <i class="ri-facebook-line text-lg"></i> Facebook
                </a>
                <a href="https://instagram.com/yatrasathi" class="text-blue-600 hover:underline">
                    <i class="ri-instagram-line text-lg"></i> Instagram
                </a>
            </div>
        </div>
    </div>
</body>
</html>
