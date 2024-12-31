<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Package;
use App\Models\Review;
use App\Models\Traveller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = Order::count();
        $newReviews = Review::where('created_at', '>=', now()->subMonth())->count(); // Adjust the time frame as needed
        $totalTravellers = Traveller::count();
        $totalPackages = Package::count();
        return view('dashboard', compact('totalBookings', 'newReviews', 'totalTravellers', 'totalPackages'));
    }
}
