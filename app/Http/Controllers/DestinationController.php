<?php
namespace App\Http\Controllers;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }
    public function destination()
    {
        $destinations = Destination::all();
        return view('destination', compact('destinations'));
    }
    public function show(Destination $destination)
    {
        $relatedDestinations = Destination::where('id', '!=', $destination->id)->take(4)->get();
        return view('viewdestination', compact('destination', 'relatedDestinations'));
    }
    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photopath' => 'required|image',
        ]);

            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath'] = $photoname;

        Destination::create($data);

        return redirect()->route('destinations.index')->with('success', 'Destination added successfully.');
    }

    public function edit($id)
    {
        $destination = Destination::find($id);
        return view('destinations.edit', compact('destination'));
    }
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'photopath' => 'required|image',
    ]);

    $destination = Destination::find($id);
    $destination->name = $validatedData['name'];
    $destination->description = $validatedData['description'];

    if ($request->hasFile('photopath')) {
        // Save new photo
        $photoname = time() . '.' . $request->photopath->extension();
        $request->photopath->move(public_path('images'), $photoname);

        // Delete old photo if exists
        if ($destination->photopath) {
            $oldPhoto = public_path('images') . '/' . $destination->photopath;
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }
        }

        // Update photo path in database
        $destination->photopath = $photoname;
    }

    $destination->save();

    return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
}


    // public function destroy($id)
    // {
    //     $destination = Destination::find($id);
    //     $photo = public_path('images') . '/' . $destination->photopath;

    //     if (file_exists($photo)) {
    //         unlink($photo);
    //     }
    //     $destination->delete();

    //     return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    // }
    public function destroy($id)
{
    $destination = Destination::find($id);

    if ($destination->photopath) {
        $photo = public_path('images') . '/' . $destination->photopath;
        if (is_file($photo)) {
            unlink($photo);
        }
    }

    $destination->delete();

    return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
}


}
