@extends('layouts.master')

@section('title', 'Tell Us Your Preferences')

@section('content')
<!-- Hero Section -->
<header class="relative w-full bg-cover bg-center overflow-hidden" style="height: 280px; background-image: url('{{ asset('travelling1.png') }}'); background-attachment: fixed;">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(10,20,60,0.85) 0%, rgba(10,20,60,0.5) 50%, rgba(10,20,60,0.2) 100%);"></div>
    <div class="relative h-full flex flex-col justify-center items-center text-center px-4">
        <span class="inline-block text-orange-400 text-xs font-bold tracking-widest uppercase mb-3"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            ✦ YatraSathi
        </span>
        <h1 class="text-white font-semibold leading-tight mb-3"
            style="font-family: 'DM Serif Display', Georgia, serif; font-size: clamp(1.8rem, 4vw, 2.8rem); text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
            Tell Us Your Preferences
        </h1>
        <p class="text-blue-100/80 text-sm max-w-md leading-relaxed"
            style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Help us create your perfect travel recommendations
        </p>
    </div>
</header>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Preferences Form -->
            <form action="{{ route('preferences.store') }}" method="POST" class="bg-white rounded-2xl shadow-md p-8">
                @csrf
                <!-- Section Helper -->
                @php
                    function sectionHeader($icon, $title, $desc) {
                        return "<div class='mb-4'>
                            <h3 class='text-lg font-bold text-blue-900 flex items-center gap-2 mb-1' style=\"font-family: 'DM Serif Display', Georgia, serif;\">
                                <i class='{$icon} text-orange-500'></i> {$title}
                            </h3>
                            <p class='text-gray-400 text-sm' style=\"font-family: 'Plus Jakarta Sans', sans-serif;\">{$desc}</p>
                        </div>";
                    }
                @endphp

                <!-- Preferred Destinations -->
                <div class="mb-10">
                    <h3 class="text-lg font-bold text-blue-900 flex items-center gap-2 mb-1"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-map-pin-line text-orange-500"></i> Preferred Destinations
                    </h3>
                    <p class="text-gray-400 text-sm mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Select destinations you're interested in visiting
                    </p>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($destinations as $destination)
                            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 cursor-pointer transition-all duration-200">
                                <input type="checkbox" name="preferred_destinations[]" value="{{ $destination->name }}"
                                    class="accent-blue-900"
                                    {{ old('preferred_destinations') && in_array($destination->name, old('preferred_destinations')) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    {{ $destination->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Travel Style -->
                <div class="mb-10">
                    <h3 class="text-lg font-bold text-blue-900 flex items-center gap-2 mb-1"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-compass-line text-orange-500"></i> Travel Style
                    </h3>
                    <p class="text-gray-400 text-sm mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        What type of travel experiences do you enjoy?
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @php
                            $travelStyles = [
                                'adventure'  => ['icon' => 'ri-mountain-line',    'title' => 'Adventure',    'desc' => 'Hiking, trekking, extreme sports'],
                                'relaxation' => ['icon' => 'ri-leaf-line',         'title' => 'Relaxation',   'desc' => 'Spa, beaches, peaceful retreats'],
                                'cultural'   => ['icon' => 'ri-government-line',   'title' => 'Cultural',     'desc' => 'Museums, heritage sites, traditions'],
                                'family'     => ['icon' => 'ri-group-line',         'title' => 'Family Fun',   'desc' => 'Kid-friendly, safe environments'],
                                'romantic'   => ['icon' => 'ri-heart-2-line',       'title' => 'Romantic',     'desc' => 'Couples retreats, intimate settings'],
                            ];
                        @endphp
                        @foreach($travelStyles as $key => $style)
                            <label class="flex items-start gap-4 p-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 cursor-pointer transition-all duration-200">
                                <input type="checkbox" name="travel_style[]" value="{{ $key }}"
                                    class="mt-1 accent-blue-900"
                                    {{ old('travel_style') && in_array($key, old('travel_style')) ? 'checked' : '' }}>
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <i class="{{ $style['icon'] }} text-orange-500"></i>
                                        <span class="font-semibold text-blue-900 text-sm"
                                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                            {{ $style['title'] }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-400" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                        {{ $style['desc'] }}
                                    </p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Budget Range -->
                <div class="mb-10">
                    <h3 class="text-lg font-bold text-blue-900 flex items-center gap-2 mb-1"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-money-dollar-circle-line text-orange-500"></i> Budget Preference
                    </h3>
                    <p class="text-gray-400 text-sm mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Choose your preferred budget range
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @php
                            $budgets = [
                                'budget'   => ['title' => 'Budget',   'range' => 'Up to $150',   'desc' => 'Affordable options'],
                                'standard' => ['title' => 'Standard', 'range' => '$150 - $400',  'desc' => 'Good value packages'],
                                'luxury'   => ['title' => 'Luxury',   'range' => '$400+',         'desc' => 'Premium experiences'],
                            ];
                        @endphp
                        @foreach($budgets as $key => $budget)
                            <label class="p-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 cursor-pointer text-center transition-all duration-200">
                                <input type="radio" name="budget_range" value="{{ $key }}"
                                    class="mb-2 accent-blue-900"
                                    {{ old('budget_range') == $key ? 'checked' : '' }}>
                                <div class="font-bold text-blue-900 text-sm mb-1"
                                    style="font-family: 'DM Serif Display', Georgia, serif;">
                                    {{ $budget['title'] }}
                                </div>
                                <div class="text-orange-500 font-bold text-sm">{{ $budget['range'] }}</div>
                                <div class="text-xs text-gray-400 mt-1"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    {{ $budget['desc'] }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Preferred Duration -->
                <div class="mb-10">
                    <h3 class="text-lg font-bold text-blue-900 flex items-center gap-2 mb-1"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-calendar-line text-orange-500"></i> Preferred Trip Duration
                    </h3>
                    <p class="text-gray-400 text-sm mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        How long do you prefer your trips to be?
                    </p>
                    <div class="grid grid-cols-3 md:grid-cols-5 gap-3">
                        @foreach([3, 5, 7, 10, 14] as $duration)
                            <label class="p-3 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 cursor-pointer text-center transition-all duration-200">
                                <input type="checkbox" name="preferred_duration[]" value="{{ $duration }}"
                                    class="mb-2 accent-blue-900"
                                    {{ old('preferred_duration') && in_array($duration, old('preferred_duration')) ? 'checked' : '' }}>
                                <div class="font-bold text-blue-900 text-sm"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    {{ $duration }} Days
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Activities -->
                <div class="mb-10">
                    <h3 class="text-lg font-bold text-blue-900 flex items-center gap-2 mb-1"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-football-line text-orange-500"></i> Favorite Activities
                    </h3>
                    <p class="text-gray-400 text-sm mb-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        Select activities you enjoy
                    </p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        @foreach(['Hiking','Sightseeing','Photography','Water Sports','Shopping','Food Tours','Wildlife','Museums','Beaches','Mountains','Historical Sites','Adventure Sports'] as $activity)
                            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 cursor-pointer transition-all duration-200">
                                <input type="checkbox" name="activities[]" value="{{ $activity }}"
                                    class="accent-blue-900"
                                    {{ old('activities') && in_array($activity, old('activities')) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700"
                                    style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                    {{ $activity }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Accommodation + Group Size -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div>
                        <h3 class="text-base font-bold text-blue-900 flex items-center gap-2 mb-3"
                            style="font-family: 'DM Serif Display', Georgia, serif;">
                            <i class="ri-hotel-line text-orange-500"></i> Accommodation Preference
                        </h3>
                        <select name="accommodation_type"
                            class="w-full p-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            <option value="">No preference</option>
                            <option value="hotel"    {{ old('accommodation_type') == 'hotel'    ? 'selected' : '' }}>Hotel</option>
                            <option value="resort"   {{ old('accommodation_type') == 'resort'   ? 'selected' : '' }}>Resort</option>
                            <option value="homestay" {{ old('accommodation_type') == 'homestay' ? 'selected' : '' }}>Homestay</option>
                            <option value="camping"  {{ old('accommodation_type') == 'camping'  ? 'selected' : '' }}>Camping</option>
                        </select>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-blue-900 flex items-center gap-2 mb-3"
                            style="font-family: 'DM Serif Display', Georgia, serif;">
                            <i class="ri-group-2-line text-orange-500"></i> Usual Group Size
                        </h3>
                        <input type="number" name="group_size_preference" min="1" max="20"
                            value="{{ old('group_size_preference', 2) }}"
                            class="w-full p-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                            style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>
                </div>

                <!-- Transportation -->
                <div class="mb-10">
                    <h3 class="text-base font-bold text-blue-900 flex items-center gap-2 mb-3"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-car-line text-orange-500"></i> Transportation Preference
                    </h3>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="transportation_preference" value="0"
                                class="accent-blue-900"
                                {{ old('transportation_preference', '0') == '0' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Group Transportation
                            </span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="transportation_preference" value="1"
                                class="accent-blue-900"
                                {{ old('transportation_preference') == '1' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700"
                                style="font-family: 'Plus Jakarta Sans', sans-serif;">
                                Private Transportation
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Special Requirements -->
                <div class="mb-10">
                    <h3 class="text-base font-bold text-blue-900 flex items-center gap-2 mb-3"
                        style="font-family: 'DM Serif Display', Georgia, serif;">
                        <i class="ri-information-line text-orange-500"></i> Special Requirements or Notes
                    </h3>
                    <textarea name="special_requirements" rows="4"
                        placeholder="Any dietary restrictions, accessibility needs, or other special requirements..."
                        class="w-full p-3 border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-200"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">{{ old('special_requirements') }}</textarea>
                </div>

                <!-- Submit -->
                <div class="text-center pt-4 border-t border-gray-100">
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-white px-12 py-3 rounded-full font-bold text-sm transition-all duration-200 hover:scale-105 flex items-center gap-2 mx-auto"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        <i class="ri-save-line"></i> Save My Preferences
                    </button>
                    <p class="text-gray-400 text-xs mt-3"
                        style="font-family: 'Plus Jakarta Sans', sans-serif;">
                        You can update these preferences anytime from your profile.
                    </p>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
