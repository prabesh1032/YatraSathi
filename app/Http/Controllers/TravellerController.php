<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TravellerController extends Controller
{
    // Display the list of travellers
    public function index()
    {
        $users = User::with(['packages', 'orders','reviews'])->get(); // Eager load both 'packages' and 'bookings'
        return view('travellers.index', compact('users'));
    }
}
