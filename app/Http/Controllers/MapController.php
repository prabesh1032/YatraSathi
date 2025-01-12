<?php

namespace App\Http\Controllers;

use App\Models\Package; // Assuming you have a Package model
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showRoutePlanning()
    {
        $packages = Package::all();
        // Fetch all package locations from the database
        $packagesArray = $packages->map(function ($package) {
            return [
                'id' => $package->id,
                'latitude' => $package->latitude,
                'longitude' => $package->longitude,
                'name' => $package->name
            ];
        });
        // Pass package data to the view
        return view('route.show', compact('packagesArray'));
    }
}
