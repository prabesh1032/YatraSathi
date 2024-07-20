<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();
        return view('dashboard', compact('totalBookings'));
    }
}
