<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    // Store a bookmark
    public function store(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        // Assign user_id to the bookmark
        $data['user_id'] = auth()->user()->id;

        // Check if the package is already bookmarked
        $check = Bookmark::where('user_id', $data['user_id'])->where('package_id', $data['package_id'])->count();

        if ($check > 0) {
            return back()->with('error', 'Package already bookmarked');
        }

        // Create the bookmark
        Bookmark::create($data);
        return back()->with('success', 'Package added to your bookmarks successfully');
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
        $bookmark = Bookmark::find($bookmark);
        // Ensure the bookmark belongs to the authenticated user
        if ($bookmark->user_id != auth()->user()->id) {
            return back()->with('error', 'Unauthorized access');
        }

        // If you want to initiate a checkout or booking, you can pass data to a view here
        return view('checkout', compact('bookmark'));
    }
}
