<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use App\Services\AIRecommendationService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Only load 12 packages for better performance
        $packages = Package::latest()->take(12)->get();
        $featuredDestinations = Destination::withCount('packages')
                        ->whereHas('packages')
                        ->orderBy('packages_count', 'desc')
                        ->take(6)
                        ->get();
        // Get AI recommendations for authenticated users
        $recommendedPackages = collect();
        if (auth()->check()) {
            $user = auth()->user();

            // Check if user needs to complete preferences
            if (!$user->preferences || !$user->preferences->preferences_completed) {
                session()->flash('show_preferences_modal', true);
            } else {
                // Get AI recommendations
                $aiService = new AIRecommendationService();
                $recommendedPackages = $aiService->getRecommendationsForUser($user);
            }
        }

        return view('welcome', compact('packages', 'recommendedPackages','featuredDestinations'));
    }
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function traveltips()
    {
        return view('traveltips');
    }
    public function adventure()
    {
        return view('adventure');
    }
    public function whyToChooseUs()
    {
        $packages = Package::take(12)->get();;
        return view('whyToChooseUs',compact( 'packages'));
    }
    public function search(Request $request)
    {
        $qry=$request->qry;
        $packages=Package::where('package_name','like','%'.$qry.'%')->get();
        return view('search',compact('packages','qry'));
    }
}
