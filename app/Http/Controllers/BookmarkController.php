<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Package;
use App\Models\Guide;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    // Direct checkout without bookmarking
    public function directCheckout(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'num_people' => 'required|integer|min:1',
            'duration_range' => 'required|integer|min:1',
            'guide_id' => 'nullable|exists:guides,id',
        ]);

        $package = Package::findOrFail($data['package_id']);

        $data['duration'] = $data['duration_range'];
        $data['total_price'] = $package->price * $data['num_people'] * $data['duration'];

        $guide = null;
        if (!empty($data['guide_id'])) {
            $guide = Guide::find($data['guide_id']);
            if (!$guide) {
                return back()->with('error', 'Selected guide is invalid.');
            }
        }

        return view('checkout', [
            'package' => $package,
            'num_people' => $data['num_people'],
            'duration' => $data['duration'],
            'total_price' => $data['total_price'],
            'guide' => $guide
        ]);
    }
}
