<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function package()
    {
        $packages = Package::all(); // Fetch all packages from the database
        return view('package', compact('packages'));
    }

    public function destination()
    {
        $destinations = Destination::all(); // Fetch all destinations from the database
        return view('destination', compact('destinations'));
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

