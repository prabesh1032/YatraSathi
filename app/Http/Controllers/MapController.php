<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Destination;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showRoutePlanning()
    {
        // Fetch all packages with coordinates
        $packages = Package::whereNotNull('latitude')
                          ->whereNotNull('longitude')
                          ->with('destination')
                          ->get();

        // Fetch all destinations with coordinates
        $destinations = Destination::whereNotNull('latitude')
                                  ->whereNotNull('longitude')
                                  ->with('packages')
                                  ->get();

        // Format packages data
        $packagesArray = $packages->map(function ($package) {
            return [
                'id' => $package->id,
                'latitude' => $package->latitude,
                'longitude' => $package->longitude,
                'name' => $package->package_name,
                'price' => $package->package_price,
                'duration' => $package->duration,
                'destination' => $package->destination ? $package->destination->name : 'Unknown'
            ];
        });

        // Format destinations data
        $destinationsArray = $destinations->map(function ($destination) {
            return [
                'id' => $destination->id,
                'latitude' => $destination->latitude,
                'longitude' => $destination->longitude,
                'name' => $destination->name,
                'description' => $destination->description,
                'packages_count' => $destination->packages->count()
            ];
        });

        return view('maps.show', compact('packagesArray', 'destinationsArray'));
    }
}
