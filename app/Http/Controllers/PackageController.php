<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function package()
    {
        $packages = Package::all();
        return view('package', compact('packages'));
    }

    public function show(Package $package)
    {
        $relatedpackages = Package::where('id', '!=', $package->id)->take(4)->get();

        $reviews = $package->reviews()->latest()->take(3)->get();

        $guides = $package->guides;

        return view('viewpackage', compact('package', 'relatedpackages', 'reviews','guides'));
    }

    public function read(Package $package)
    {
        $relatedpackages = Package::where('id', '!=', $package->id)->take(4)->get();
        return view('readpackage', compact('package', 'relatedpackages'));
    }

    public function create()
    {
        return view('packages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:packages,name',
            'location' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:5000',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $data = $request->only(['name', 'location', 'duration', 'price', 'description', 'latitude', 'longitude']);

        // Handle image upload using Laravel's Storage facade
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
        $package = Package::findOrFail($id); // Use findOrFail for robust error handling

        $request->validate([
            'name' => 'required|string|max:255|unique:packages,name,' . $package->id,
            'location' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:5000',
            'latitude' => 'nullable|numeric|between:-90,90',  // Validate latitude
            'longitude' => 'nullable|numeric|between:-180,180',  // Validate longitude
        ]);

        $package->name = $request->name;
        $package->location = $request->location;
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
