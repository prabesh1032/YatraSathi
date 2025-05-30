<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Package;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create the review for the package
        Review::create([
            'package_id' => $request->package_id,
            'user_id' => auth()->id(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        // Redirect back with success message
        return back()->with('success', 'Thank you for your review!');
    }

    public function index()
    {
        $reviews = Review::with('package', 'user')->latest()->paginate(15);
        return view('reviews.index', compact('reviews'));
    }
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}
