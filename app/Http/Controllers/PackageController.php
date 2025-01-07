<?php
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PackageController extends Controller
{
    public function index()
    {
        // Fetch all packages as an array
        $packages = Package::all()->toArray();

        // Bubble Sort the packages by price in ascending order
        $n = count($packages);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($packages[$j]['price'] > $packages[$j + 1]['price']) {
                    // Swap the elements
                    $temp = $packages[$j];
                    $packages[$j] = $packages[$j + 1];
                    $packages[$j + 1] = $temp;
                }
            }
        }

        // Convert the sorted array back to a collection
        $sortedPackages = collect($packages);

        // Pass the sorted packages to the view
        return view('packages.index', ['packages' => $sortedPackages]);
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

        return view('viewpackage', compact('package', 'relatedpackages', 'reviews'));
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
            'name' => 'required',
            'location' => 'required',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
            'photopath' => 'nullable|image',
            'description' => 'nullable',
        ]);

        $data = $request->only(['name', 'location', 'duration', 'people', 'price', 'description']);

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
        $package = Package::find($id);
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
            'photopath' => 'nullable|image',
            'description' => 'nullable',
        ]);

        $package = Package::find($id);
        $package->name = $request->name;
        $package->location = $request->location;
        $package->duration = $request->duration;
        $package->price = $request->price;
        $package->description = $request->description;

        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);

            if ($package->photopath) {
                $oldPhoto = public_path('images') . '/' . $package->photopath;
                if (file_exists($oldPhoto)) {
                    unlink($oldPhoto);
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
}
