<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TravellerController extends Controller
{
    // Display the list of travellers
    public function index()
    {
        $users = User::where(function ($query) {
            $query->whereNull('role')
                ->orWhere('role', '!=', 'admin');
        })->with(['packages', 'orders', 'reviews'])->get(); // Eager load related records for non-admin users
        return view('travellers.index', compact('users'));
    }
}
