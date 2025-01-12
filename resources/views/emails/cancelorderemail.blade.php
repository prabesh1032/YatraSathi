<div style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <div style="text-align: center; padding: 10px 0;">
        <h1 style="color: #e74c3c; font-size: 28px; margin: 0;">YatraSathi</h1>
        <p style="font-size: 14px; color: #555;">Your trusted travel companion</p>
    </div>

    <div style="background-color: #fff; padding: 20px; border-radius: 10px; margin-top: 20px;">
        <p style="font-size: 18px; color: #333; margin-bottom: 15px;">Dear {{ $name }},</p>
        <p style="font-size: 16px; color: #666; line-height: 1.6;">We're sorry to inform you that your booking has been <strong style="color: #e74c3c;">cancelled</strong> by you.
        We understand that plans change, and we're here to assist you with anything you might need.</p>

        <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">

        <h3 style="color: #333; font-size: 18px; margin-bottom: 10px;">Booking Details:</h3>
        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            <strong>Package Name:</strong> {{ $package->name }} <br>
            <strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }} <br>
            <strong>Number of Travelers:</strong> {{ $order->num_people }} <br>
            <strong>Duration:</strong> {{ $package->duration }} Days <br>
            <strong>Traveling On:</strong> {{ \Carbon\Carbon::parse($order->travel_date)->format('d M Y') }} <br>
            <strong>Payment Method:</strong> {{ $order->payment_method }}
        </p>

        <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">

        <p style="font-size: 16px; color: #666; line-height: 1.6;">
            If you have any questions, require further assistance, or need to inquire about a refund for your cancelled booking, please contact our support team at
            <a href="mailto:support@yatrasathi.com" style="color: #2c7bf7; text-decoration: none;">support@yatrasathi.com</a>.
            We're here to ensure a smooth process for you.
        </p>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('home') }}" style="background-color: #2c7bf7; color: #fff; padding: 10px 20px; font-size: 16px; border-radius: 5px; text-decoration: none;">Explore More Packages</a>
        </div>
    </div>

    <footer style="text-align: center; margin-top: 20px; font-size: 14px; color: #888;">
        <p>© 2024 YatraSathi. All rights reserved.</p>
        <p>Follow us: <a href="https://twitter.com/yatrasathi" style="color: #2c7bf7; text-decoration: none;">Twitter</a> | <a href="https://facebook.com/yatrasathi" style="color: #2c7bf7; text-decoration: none;">Facebook</a></p>
    </footer>
</div>
