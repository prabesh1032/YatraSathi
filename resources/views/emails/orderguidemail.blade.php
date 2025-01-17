<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-4">
            <h1 class="text-xl font-bold">New Booking Assigned</h1>
        </div>
        <div class="p-6">
            <p class="mb-4">Dear {{ $guide->name }},</p>

            <p class="mb-4">You have been assigned as the guide for a new booking. Here are the details:</p>

            <h3 class="text-lg font-semibold text-blue-600 mb-2">Package Details</h3>
            <ul class="list-disc list-inside mb-4">
                <li><strong>Package Name:</strong> {{ $packageName }}</li>
                <li><strong>Travel Date:</strong> {{ $travelDate }}</li>
                <li><strong>Number of People:</strong> {{ $numPeople }}</li>
                <li><strong>Total Price:</strong> ${{ $totalPrice }}</li>
            </ul>

            <h3 class="text-lg font-semibold text-blue-600 mb-2">User Details</h3>
            <ul class="list-disc list-inside mb-4">
                <li><strong>Name:</strong> {{ $userName }}</li>
                <li><strong>Phone:</strong> {{ $userPhone }}</li>
                <li><strong>Address:</strong> {{ $userAddress }}</li>
            </ul>

            <p>Please reach out to the user to confirm the booking details and coordinate further.</p>

            <p class="mt-6">Thank you for your partnership with YatraSathi!</p>

            <p class="mt-4">Best regards,</p>
            <p class="font-semibold">The YatraSathi Team</p>
        </div>
    </div>
</body>
</html>
