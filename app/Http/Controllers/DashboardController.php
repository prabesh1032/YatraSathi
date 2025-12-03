<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Package;
use App\Models\Review;
use App\Models\Traveller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = Order::count();
        $newReviews = Review::where('created_at', '>=', now()->subMonth())->count(); // Adjust the time frame as needed
        $totalTravellers = User::count();
        $totalPackages = Package::count();
        $allPackages = Package::all();
        $packageNames = $allPackages->pluck('package_name')->toArray(); // Extract names of all packages
        $userCounts = [];

        foreach ($allPackages as $package) {
            $userCounts[] = Order::where('package_id', $package->id)->count(); // Count bookings for each package
        }


        return view('dashboard', compact(
            'totalBookings',
            'newReviews',
            'totalTravellers',
            'totalPackages',
            'packageNames',
            'userCounts'
        ));
    }
}
