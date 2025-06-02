<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Package;
use GMP;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();
        return view('guides.index', compact('guides'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('guides.create',compact('packages'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255|unique:guides',
            'description' => 'nullable|string|max:5000',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'package_id' => 'required|exists:packages,id',
            'email' => 'required|email|unique:guides,email', // email validation for guide model
            'experience' => 'required|integer|min:1|max:100', // Experience field validation
        ]);

        $data = $request->only(['name', 'description', 'package_id', 'email', 'experience']); // Including experience

        // Handling file upload
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath'] = $photoname;
        }

        // Creating a new guide
        Guide::create($data);
        return redirect()->route('guides.index')->with('success', 'Guide created successfully.');
    }

    public function show(Request $request)
    {
        $packages = Package::all();
        $selectedPackage = $request->get('specialization');
        $guides = Guide::when($selectedPackage, function ($query) use ($selectedPackage) {
            return $query->where('package_id', $selectedPackage);
        })->get()->map(function ($guide) {
            // Check if the guide is currently booked
            $isBooked = \App\Models\Order::where('guide_id', $guide->id)
                ->where('status', '!=', 'Completed') // Check for non-completed orders
                ->exists();

            // Count the number of completed orders for the guide
            $toursCompleted = \App\Models\Order::where('guide_id', $guide->id)
                ->where('status', 'Completed') // Count only completed orders
                ->count();

            $guide->is_booked = $isBooked;
            $guide->tours_count = $toursCompleted;

            return $guide;
        });

        return view('guides.show', compact('guides', 'packages', 'selectedPackage'));
    }
    public function profile($id)
    {
        $guide = Guide::with('package')->findOrFail($id);

        // Check if the guide is currently booked
        $isBooked = \App\Models\Order::where('guide_id', $guide->id)
            ->where('status', '!=', 'Completed') // Check for non-completed orders
            ->exists();

        // Count the number of completed orders for the guide
        $toursCompleted = \App\Models\Order::where('guide_id', $guide->id)
            ->where('status', 'Completed') // Count only completed orders
            ->count();
        $guide->is_booked = $isBooked;
        $guide->tours_count = $toursCompleted;
        return view('guides.profile', compact('guide'));
    }

    public function edit($id)
    {
        $guide = Guide::findOrFail($id);
        $packages = Package::all();
        return view('guides.edit', compact('guide', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $guide = Guide::findOrFail($id);

        // Validation
        $request->validate([
            'name' => 'required|string|max:255|unique:guides,name,' . $guide->id,
            'description' => 'nullable|string|max:5000',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'package_id' => 'required|exists:packages,id',
            'email' => 'required|email|unique:guides,email,' . $guide->id, // Allow updating of email without violating unique constraint
            'experience' => 'required|integer|min:1|max:100', // Experience field validation
        ]);

        // Update guide details
        $guide->name = $request->name;
        $guide->email = $request->email;
        $guide->description = $request->description;
        $guide->package_id = $request->package_id;
        $guide->experience = $request->experience; // Update experience

        // Handle photo upload
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);

            // Delete old photo if exists
            if ($guide->photopath) {
                $oldphotopath = public_path('images') . '/' . $guide->photopath;
                if (file_exists($oldphotopath)) {
                    unlink($oldphotopath);
                }
            }

            $guide->photopath = $photoname;
        }

        $guide->save();
        return redirect()->route('guides.index')->with('success', 'Guide updated successfully.');
    }

    public function destroy(string $id)
    {
        $guide = Guide::findOrFail($id);

        // Delete the associated photo
        if ($guide->photopath) {
            $photo = public_path('images') . '/' . $guide->photopath;
            if (file_exists($photo)) {
                unlink($photo);
            }
        }

        // Delete the guide record
        $guide->delete();

        // Flash success message and redirect to the index
        return redirect()->route('guides.index')->with('success', 'Guide deleted successfully.');
    }
}
