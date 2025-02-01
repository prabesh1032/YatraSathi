<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('userprofile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = auth()->user();

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
            }

            // Store new profile picture
            $profilePictureName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->storeAs('public/profile_pictures', $profilePictureName);
            $validated['profile_picture'] = $profilePictureName;
        }

        $user->update($validated);

        return redirect()->route('userprofile.edit')
            ->with('success', 'Profile updated successfully!');
    }
}
