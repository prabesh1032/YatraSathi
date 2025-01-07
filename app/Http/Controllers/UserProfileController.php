<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('userprofile.edit', ['user' => auth()->user()]);
    }
    public function update(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $user = auth()->user();

        // Update other user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save(); // Save all changes to the database

        return redirect('/')->with('success', 'Profile updated successfully!');
    }
}
