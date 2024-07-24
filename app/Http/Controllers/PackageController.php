<?php
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
{
    // Fetch paginated packages
    $packages = Package::paginate(10); // Adjust the number of items per page as needed

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
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'required|image',
        ]);
            $photoname = time() . '.' . $request->image_url->extension();
            $request->image_url->move(public_path('images'), $photoname);
            $data['image_url'] = $photoname;

        Package::create($data);

        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'required|required',
        ]);
        $package = Package::find($id);
        $package->name = $request->name;
        $package->description = $request->description;
        $package->price = $request->price;

        if ($request->hasFile('image_url')) {
            // Save new photo
        $photoname = time() . '.' . $request->image_url->extension();
        $request->image_url->move(public_path('images'), $photoname);

        // Delete old photo if exists
        if ($package->photopath) {
            $oldPhoto = public_path('images') . '/' . $package->photopath;
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }
        }
        $package->image_url= $photoname;
        }

        $package->save();

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        if ($package->image_url) {
            $photo = public_path('images') . '/' . $package->image_url;
            if (is_file($photo)) {
                unlink($photo);
            }
        }

        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    }
}
