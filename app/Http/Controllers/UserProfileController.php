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
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $user = auth()->user();

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture) {
                $oldPicturePath = public_path('storage/profile_pictures/' . $user->profile_picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }

            // Create directory if it doesn't exist
            $uploadPath = public_path('storage/profile_pictures');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Upload new picture
            $filename = time() . '_' . uniqid() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move($uploadPath, $filename);
            $validated['profile_picture'] = $filename;
        }

        $user->update($validated);

        return redirect()->route('userprofile.edit')
            ->with('success', 'Profile updated successfully!');
    }
}
