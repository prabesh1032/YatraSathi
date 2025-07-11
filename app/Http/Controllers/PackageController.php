<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
class PackageController extends Controller
{

    public function package(Request $request)
    {
        $sort_by = $request->input('sort_by');

        // Fetch all packages
        $packages = Package::all();

        // Bubble sort implementation
        if ($sort_by == 'price_asc') {
            // Sort packages by price low to high
            for ($i = 0; $i < count($packages); $i++) {
                for ($j = 0; $j < count($packages) - $i - 1; $j++) {
                    if ($packages[$j]->price > $packages[$j + 1]->price) {
                        // Swap packages[j] and packages[j + 1]
                        $temp = $packages[$j];
                        $packages[$j] = $packages[$j + 1];
                        $packages[$j + 1] = $temp;
                    }
                }
            }
        } elseif ($sort_by == 'price_desc') {
            // Sort packages by price high to low
            for ($i = 0; $i < count($packages); $i++) {
                for ($j = 0; $j < count($packages) - $i - 1; $j++) {
                    if ($packages[$j]->price < $packages[$j + 1]->price) {
                        // Swap packages[j] and packages[j + 1]
                        $temp = $packages[$j];
                        $packages[$j] = $packages[$j + 1];
                        $packages[$j + 1] = $temp;
                    }
                }
            }
        } elseif ($sort_by == 'latest') {
            // Sort packages by the latest created (use created_at)
            for ($i = 0; $i < count($packages); $i++) {
                for ($j = 0; $j < count($packages) - $i - 1; $j++) {
                    if ($packages[$j]->created_at < $packages[$j + 1]->created_at) {
                        // Swap packages[j] and packages[j + 1]
                        $temp = $packages[$j];
                        $packages[$j] = $packages[$j + 1];
                        $packages[$j + 1] = $temp;
                    }
                }
            }
        } elseif ($sort_by == 'shortest') {
            // Sort packages by shortest duration
            for ($i = 0; $i < count($packages); $i++) {
                for ($j = 0; $j < count($packages) - $i - 1; $j++) {
                    if ($packages[$j]->duration > $packages[$j + 1]->duration) {
                        // Swap packages[j] and packages[j + 1]
                        $temp = $packages[$j];
                        $packages[$j] = $packages[$j + 1];
                        $packages[$j + 1] = $temp;
                    }
                }
            }
        } elseif ($sort_by == 'longest') {
            // Sort packages by longest duration
            for ($i = 0; $i < count($packages); $i++) {
                for ($j = 0; $j < count($packages) - $i - 1; $j++) {
                    if ($packages[$j]->duration < $packages[$j + 1]->duration) {
                        // Swap packages[j] and packages[j + 1]
                        $temp = $packages[$j];
                        $packages[$j] = $packages[$j + 1];
                        $packages[$j + 1] = $temp;
                    }
                }
            }
        }

        return view('package', compact('packages'));
    }
    public function show(Package $package)
    {
        $relatedpackages = Package::where('id', '!=', $package->id)->take(4)->get();
        $reviews = $package->reviews()->latest()->take(3)->get();
        $guides = $package->guides()->whereDoesntHave('orders', function ($query) use ($package) {
            $query->where('status', '!=', 'Completed')
                ->where('package_id', $package->id);
        })->get();

        return view('viewpackage', compact('package', 'relatedpackages', 'reviews', 'guides'));
    }

    public function read(Package $package)
    {
        $relatedpackages = Package::where('id', '!=', $package->id)->take(4)->get();
        return view('readpackage', compact('package', 'relatedpackages'));
    }
     public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'starting_location' => 'required|string|max:255', // Validate starting location
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
            'description' => 'nullable|string|max:50000',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $data = $request->only([
            'name',
            'location',
            'starting_location',
            'duration',
            'price',
            'description',
            'latitude',
            'longitude',
        ]);

        // Handle image upload
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath'] = $photoname;
        }

        Package::create($data);

        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }


    public function edit($id)
    {
        $package = Package::findOrFail($id); // Use findOrFail to handle invalid IDs
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'starting_location' => 'required|string|max:255', // Validate starting location
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
            'description' => 'nullable|string|max:50000',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $package->name = $request->name;
        $package->location = $request->location;
        $package->starting_location = $request->starting_location; // Set starting location
        $package->duration = $request->duration;
        $package->price = $request->price;
        $package->description = $request->description;
        $package->latitude = $request->latitude;
        $package->longitude = $request->longitude;

        // Handle image upload
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);

            // Delete the old photo if it exists
            if ($package->photopath) {
                $oldPhotoPath = public_path('images') . '/' . $package->photopath;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            $package->photopath = $photoname;
        }

        $package->save();

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        if ($package->photopath) {
            $photo = public_path('images') . '/' . $package->photopath;
            if (is_file($photo)) {
                unlink($photo);
            }
        }

        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    }
    public function showLocationPage(Package $package)
    {
        $locations = Package::select('location')->distinct()->get();
        $packages = Package::where('id', '!=', $package->id)->get();
        return view('location.index', compact('locations', 'packages', 'package'));
    }
    public function showPackagesByLocation(Request $request)
    {
        $location = $request->input('location');
        $packages = Package::where('location', $location)->get();
        return view('location.package', compact('location', 'packages'));
    }
}
