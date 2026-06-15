<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\UserPreference;
use Illuminate\Http\Request;

class UserPreferenceController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $destinations = Destination::all();

        // Check if user already has preferences
        $preferences = $user->preferences;

        if ($preferences && $preferences->preferences_completed) {
            return redirect('/')->with('info', 'You have already completed your preferences.');
        }

        return view('preferences.form', compact('destinations', 'preferences'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'preferred_destinations' => 'nullable|array',
            'travel_style' => 'nullable|array',
            'budget_range' => 'nullable|string|in:budget,standard,luxury',
            'preferred_duration' => 'nullable|array',
            'activities' => 'nullable|array',
            'accommodation_type' => 'nullable|string',
            'transportation_preference' => 'nullable|boolean',
            'group_size_preference' => 'nullable|integer|min:1|max:20',
            'avoid_destinations' => 'nullable|array',
            'special_requirements' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();

        // Create or update preferences
        UserPreference::updateOrCreate(
            ['user_id' => $user->id],
            array_merge($validated, ['preferences_completed' => true])
        );

        return redirect('/')->with('success', 'Your preferences have been saved! You will now see personalized recommendations.');
    }

    public function edit()
    {
        $user = auth()->user();
        $preferences = $user->preferences;
        $destinations = Destination::all();

        if (!$preferences) {
            return redirect()->route('preferences.show');
        }

        return view('preferences.edit', compact('preferences', 'destinations'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'preferred_destinations' => 'nullable|array',
            'travel_style' => 'nullable|array',
            'budget_range' => 'nullable|string|in:budget,standard,luxury',
            'preferred_duration' => 'nullable|array',
            'activities' => 'nullable|array',
            'accommodation_type' => 'nullable|string',
            'transportation_preference' => 'nullable|boolean',
            'group_size_preference' => 'nullable|integer|min:1|max:20',
            'avoid_destinations' => 'nullable|array',
            'special_requirements' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();
        $preferences = $user->preferences;

        if ($preferences) {
            $preferences->update($validated);
            return redirect('/')->with('success', 'Your preferences have been updated!');
        }

        return redirect()->route('preferences.show');
    }
}
