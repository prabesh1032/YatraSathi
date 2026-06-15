@extends('layouts.master')

@section('title', 'Tell Us Your Preferences')

@section('content')
<!-- Hero Section -->
<header class="relative h-64 bg-gradient-to-r from-indigo-600 to-purple-700">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-extrabold text-yellow-400 drop-shadow-lg mb-4">
            <i class="ri-heart-line mr-3"></i>Tell Us Your Preferences
        </h1>
        <p class="text-xl md:text-2xl font-medium">
            Help us create your perfect travel recommendations
        </p>
    </div>
</header>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Welcome Message -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <div class="text-center mb-6">
                    <i class="ri-magic-line text-6xl text-indigo-600 mb-4"></i>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Welcome to YatraSathi!</h2>
                    <p class="text-lg text-gray-600">
                        To provide you with personalized travel recommendations, please take a moment to tell us about your preferences.
                        This will help our AI system suggest the perfect packages for you!
                    </p>
                </div>
            </div>

            <!-- Preferences Form -->
            <form action="{{ route('preferences.store') }}" method="POST" class="bg-white rounded-lg shadow-lg p-8">
                @csrf
                
                <!-- Preferred Destinations -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-gray-800 mb-4">
                        <i class="ri-map-pin-line text-indigo-600 mr-2"></i>Preferred Destinations
                    </label>
                    <p class="text-gray-600 mb-4">Select destinations you're interested in visiting:</p>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($destinations as $destination)
                            <label class="flex items-center p-3 border rounded-lg hover:bg-indigo-50 cursor-pointer">
                                <input type="checkbox" name="preferred_destinations[]" value="{{ $destination->name }}" 
                                       class="mr-3 text-indigo-600 focus:ring-indigo-500"
                                       {{ old('preferred_destinations') && in_array($destination->name, old('preferred_destinations')) ? 'checked' : '' }}>
                                <span class="text-gray-800">{{ $destination->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Travel Style -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-gray-800 mb-4">
                        <i class="ri-compass-line text-indigo-600 mr-2"></i>Travel Style
                    </label>
                    <p class="text-gray-600 mb-4">What type of travel experiences do you enjoy?</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $travelStyles = [
                                'adventure' => ['icon' => 'ri-mountain-line', 'title' => 'Adventure', 'desc' => 'Hiking, trekking, extreme sports'],
                                'relaxation' => ['icon' => 'ri-leaf-line', 'title' => 'Relaxation', 'desc' => 'Spa, beaches, peaceful retreats'],
                                'cultural' => ['icon' => 'ri-government-line', 'title' => 'Cultural', 'desc' => 'Museums, heritage sites, traditions'],
                                'family' => ['icon' => 'ri-group-line', 'title' => 'Family Fun', 'desc' => 'Kid-friendly, safe environments'],
                                'romantic' => ['icon' => 'ri-heart-2-line', 'title' => 'Romantic', 'desc' => 'Couples retreats, intimate settings']
                            ];
                        @endphp
                        @foreach($travelStyles as $key => $style)
                            <label class="flex items-start p-4 border rounded-lg hover:bg-indigo-50 cursor-pointer">
                                <input type="checkbox" name="travel_style[]" value="{{ $key }}" 
                                       class="mt-1 mr-4 text-indigo-600 focus:ring-indigo-500"
                                       {{ old('travel_style') && in_array($key, old('travel_style')) ? 'checked' : '' }}>
                                <div>
                                    <div class="flex items-center mb-1">
                                        <i class="{{ $style['icon'] }} text-indigo-600 mr-2"></i>
                                        <span class="font-semibold text-gray-800">{{ $style['title'] }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600">{{ $style['desc'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Budget Range -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-gray-800 mb-4">
                        <i class="ri-money-dollar-circle-line text-indigo-600 mr-2"></i>Budget Preference
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @php
                            $budgets = [
                                'budget' => ['title' => 'Budget', 'range' => 'Up to $150', 'desc' => 'Affordable options'],
                                'standard' => ['title' => 'Standard', 'range' => '$150 - $400', 'desc' => 'Good value packages'],
                                'luxury' => ['title' => 'Luxury', 'range' => '$400+', 'desc' => 'Premium experiences']
                            ];
                        @endphp
                        @foreach($budgets as $key => $budget)
                            <label class="p-4 border rounded-lg hover:bg-indigo-50 cursor-pointer text-center">
                                <input type="radio" name="budget_range" value="{{ $key }}" 
                                       class="mb-3 text-indigo-600 focus:ring-indigo-500"
                                       {{ old('budget_range') == $key ? 'checked' : '' }}>
                                <div class="font-semibold text-gray-800">{{ $budget['title'] }}</div>
                                <div class="text-indigo-600 font-bold">{{ $budget['range'] }}</div>
                                <div class="text-sm text-gray-600">{{ $budget['desc'] }}</div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Preferred Duration -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-gray-800 mb-4">
                        <i class="ri-calendar-line text-indigo-600 mr-2"></i>Preferred Trip Duration
                    </label>
                    <div class="grid grid-cols-3 md:grid-cols-5 gap-4">
                        @php
                            $durations = [3, 5, 7, 10, 14];
                        @endphp
                        @foreach($durations as $duration)
                            <label class="p-3 border rounded-lg hover:bg-indigo-50 cursor-pointer text-center">
                                <input type="checkbox" name="preferred_duration[]" value="{{ $duration }}" 
                                       class="mb-2 text-indigo-600 focus:ring-indigo-500"
                                       {{ old('preferred_duration') && in_array($duration, old('preferred_duration')) ? 'checked' : '' }}>
                                <div class="font-semibold text-gray-800">{{ $duration }} Days</div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Activities -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-gray-800 mb-4">
                        <i class="ri-football-line text-indigo-600 mr-2"></i>Favorite Activities
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @php
                            $activities = [
                                'Hiking', 'Sightseeing', 'Photography', 'Water Sports', 
                                'Shopping', 'Food Tours', 'Wildlife', 'Museums',
                                'Beaches', 'Mountains', 'Historical Sites', 'Adventure Sports'
                            ];
                        @endphp
                        @foreach($activities as $activity)
                            <label class="flex items-center p-3 border rounded-lg hover:bg-indigo-50 cursor-pointer">
                                <input type="checkbox" name="activities[]" value="{{ $activity }}" 
                                       class="mr-3 text-indigo-600 focus:ring-indigo-500"
                                       {{ old('activities') && in_array($activity, old('activities')) ? 'checked' : '' }}>
                                <span class="text-gray-800">{{ $activity }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Additional Preferences -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Accommodation Type -->
                    <div>
                        <label class="block text-lg font-bold text-gray-800 mb-3">
                            <i class="ri-hotel-line text-indigo-600 mr-2"></i>Accommodation Preference
                        </label>
                        <select name="accommodation_type" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <option value="">No preference</option>
                            <option value="hotel" {{ old('accommodation_type') == 'hotel' ? 'selected' : '' }}>Hotel</option>
                            <option value="resort" {{ old('accommodation_type') == 'resort' ? 'selected' : '' }}>Resort</option>
                            <option value="homestay" {{ old('accommodation_type') == 'homestay' ? 'selected' : '' }}>Homestay</option>
                            <option value="camping" {{ old('accommodation_type') == 'camping' ? 'selected' : '' }}>Camping</option>
                        </select>
                    </div>

                    <!-- Group Size -->
                    <div>
                        <label class="block text-lg font-bold text-gray-800 mb-3">
                            <i class="ri-group-2-line text-indigo-600 mr-2"></i>Usual Group Size
                        </label>
                        <input type="number" name="group_size_preference" min="1" max="20" value="{{ old('group_size_preference', 2) }}" 
                               class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <!-- Transportation -->
                <div class="mb-8">
                    <label class="block text-lg font-bold text-gray-800 mb-3">
                        <i class="ri-car-line text-indigo-600 mr-2"></i>Transportation Preference
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center">
                            <input type="radio" name="transportation_preference" value="0" 
                                   class="mr-3 text-indigo-600 focus:ring-indigo-500"
                                   {{ old('transportation_preference', '0') == '0' ? 'checked' : '' }}>
                            <span class="text-gray-800">Group Transportation</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="transportation_preference" value="1" 
                                   class="mr-3 text-indigo-600 focus:ring-indigo-500"
                                   {{ old('transportation_preference') == '1' ? 'checked' : '' }}>
                            <span class="text-gray-800">Private Transportation</span>
                        </label>
                    </div>
                </div>

                <!-- Special Requirements -->
                <div class="mb-8">
                    <label class="block text-lg font-bold text-gray-800 mb-3">
                        <i class="ri-information-line text-indigo-600 mr-2"></i>Special Requirements or Notes
                    </label>
                    <textarea name="special_requirements" rows="4" placeholder="Any dietary restrictions, accessibility needs, or other special requirements..."
                              class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">{{ old('special_requirements') }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-indigo-600 text-white px-12 py-4 rounded-lg font-bold text-lg hover:bg-indigo-700 transition-colors duration-300 transform hover:scale-105">
                        <i class="ri-save-line mr-2"></i>Save My Preferences
                    </button>
                    <p class="text-gray-600 mt-4">You can update these preferences anytime from your profile.</p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection