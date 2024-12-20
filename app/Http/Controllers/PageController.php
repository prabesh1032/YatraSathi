<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $packages = Package::take(12)->get();;
        return view('welcome', compact( 'packages'));
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
        $packages=Package::where('name','like','%'.$qry.'%')->get();
        return view('search',compact('packages','qry'));
    }
}
