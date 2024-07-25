<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $destinations = Destination::all();
        $packages = Package::all();
        return view('welcome', compact('destinations', 'packages'));
    }

    public function package($id)
    {

        $package = Package::find($id);
        return view('package', compact('package'));
    }

    public function destination($id)
    {
        $destination = Destination::find($id);
        return view('destination', compact('destination'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Handle the email sending logic here

        return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon.');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
