<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Package;
use App\Models\Guide;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    // Store a bookmark
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'num_people' => 'required|integer|min:1',
            'duration_range' => 'required|integer|min:1', // User-selected duration
            'guide_id' => 'nullable|exists:guides,id', // Optional guide_id validation
        ]);

        $data['user_id'] = auth()->user()->id;

        // Ensure the package exists
        $package = Package::find($data['package_id']);

        // Check if the bookmark already exists
        $query = Bookmark::where('user_id', $data['user_id'])
            ->where('package_id', $data['package_id']);

        if (!empty($data['guide_id'])) {
            $query->where('guide_id', $data['guide_id']);
        } else {
            $query->whereNull('guide_id');
        }

        $check = $query->count();

        if ($check > 0) {
            return back()->with('error', 'This combination of package and guide is already bookmarked.');
        }

        // Set the user-selected duration
        $data['duration'] = $data['duration_range'];

        // Calculate total price
        $data['total_price'] = $package->price * $data['num_people'] * $data['duration'];

        // Check if guide_id is provided and valid
        if (!empty($data['guide_id'])) {
            $guide = Guide::find($data['guide_id']);
            if (!$guide) {
                return back()->with('error', 'Selected guide is invalid.');
            }
        }

        // Create the bookmark
        Bookmark::create($data);

        return back()->with('success', 'Package added to your adventure successfully.');
    }
    // Display all bookmarks for the user
    public function myBookmarks()
    {
        $bookmarks = Bookmark::where('user_id', auth()->user()->id)->get();
        return view('bookmark', compact('bookmarks'));
    }

    // Remove a bookmark
    public function destroy(Bookmark $bookmark)
    {
        // Ensure the bookmark belongs to the authenticated user
        if ($bookmark->user_id != auth()->user()->id) {
            return back()->with('error', 'Unauthorized access');
        }

        // Delete the bookmark
        $bookmark->delete();

        return back()->with('success', 'Package removed from bookmarks successfully');
    }

    // Handle checkout or action for bookmarked package
    public function checkout($bookmark)
    {
        // Attempt to find the bookmark
        $bookmark = Bookmark::find($bookmark);

        // Check if the bookmark exists
        if (!$bookmark) {
            return back()->with('error', 'Bookmark not found.');
        }

        // Ensure the bookmark belongs to the authenticated user
        if ($bookmark->user_id != auth()->user()->id) {
            return back()->with('error', 'Unauthorized access.');
        }
        return view('checkout', ['bookmark' => $bookmark]);
    }
}
