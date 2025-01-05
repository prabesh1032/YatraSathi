<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Package;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    // Store a bookmark
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'num_people' => 'required|integer|min:1',
        ]);

        $data['user_id'] = auth()->user()->id;

        $check = Bookmark::where('user_id', $data['user_id'])
                         ->where('package_id', $data['package_id'])
                         ->count();

        if ($check > 0) {
            return back()->with('error', 'Package already bookmarked');
        }
        $package = Package::find($data['package_id']);
        $data['total_price'] = $package->price * $data['num_people'];
        Bookmark::create($data);
        return back()->with('success', 'Package added to your adventure successfully');
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

        // Proceed with the checkout process
        return view('checkout', ['bookmark' => $bookmark]);
    }
}
