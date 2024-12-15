<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'package_id' => $request->package_id,
            'user_id' => auth()->id(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Thank you for your review!');
    }
    public function index()
    {
        $reviews = Review::with('package', 'user')->latest()->paginate(10);
        return view('reviews.index', compact('reviews'));
    }
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Optional: Ensure only the admin or the user who created the review can delete it
        if (auth()->id() !== $review->user_id && !auth()->user()->is_admin) {
            return back()->with('error', 'You are not authorized to delete this review.');
        }

        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }

}
