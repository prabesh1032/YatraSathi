<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::latest()->get();
        return view('destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $data = $request->only(['name', 'description', 'latitude', 'longitude']);

        // Handle image upload
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath'] = $photoname;
        }

        Destination::create($data);

        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $packages = $destination->packages()->latest()->get();
        return view('destinations.package', compact('destination', 'packages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->latitude = $request->latitude;
        $destination->longitude = $request->longitude;

        // Handle image upload
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);

            // Delete the old photo if it exists
            if ($destination->photopath) {
                $oldPhotoPath = public_path('images') . '/' . $destination->photopath;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            $destination->photopath = $photoname;
        }

        $destination->save();

        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        // Delete the photo if it exists
        if ($destination->photopath) {
            $photo = public_path('images') . '/' . $destination->photopath;
            if (is_file($photo)) {
                unlink($photo);
            }
        }

        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }

    /**
     * Show all destinations for public users
     */
    public function showAll()
    {
        $destinations = Destination::with('packages')->latest()->get();
        return view('destinations.public', compact('destinations'));
    }
}
