<?php

namespace App\Http\Controllers;

use App\Models\Traveller;
use Illuminate\Http\Request;

class TravellerController extends Controller
{
    // Display the list of travellers
    public function index()
    {
        // Fetch only travellers who have booked packages
        $travellers = Traveller::with('package')
                        ->whereNotNull('package_id') // Ensures they have booked a package
                        ->get();

        return view('travellers.index', compact('travellers'));
    }

}
