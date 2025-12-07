<?php

namespace App\Services;

use App\Models\Package;
use App\Models\Order;
use App\Models\UserPreference;
use App\Models\User;
use Illuminate\Support\Collection;

class AIRecommendationService
{
    /**
     * Get AI-powered package recommendations for a user
     */
    public function getRecommendationsForUser(User $user, int $limit = 6): Collection
    {
        $preferences = $user->preferences;
        $bookingHistory = $user->orders()->with('package')->get();

        // Get all packages
        $allPackages = Package::with('destination')->get();

        // Score each package based on user preferences and history
        $scoredPackages = $allPackages->map(function ($package) use ($preferences, $bookingHistory, $user) {
            $score = $this->calculatePackageScore($package, $preferences, $bookingHistory, $user);
            $package->recommendation_score = $score;
            $package->recommendation_reasons = $this->getRecommendationReasons($package, $preferences, $bookingHistory);
            return $package;
        });

        // Sort by score and return top recommendations
        return $scoredPackages
            ->filter(function ($package) use ($bookingHistory) {
                // Exclude already booked packages (unless it's a repeat traveler pattern)
                return !$bookingHistory->pluck('package_id')->contains($package->id);
            })
            ->sortByDesc('recommendation_score')
            ->take($limit)
            ->values();
    }

    /**
     * Calculate recommendation score for a package
     */
    private function calculatePackageScore(Package $package, ?UserPreference $preferences, Collection $bookingHistory, User $user): float
    {
        $score = 0;

        // Base score
        $score += 50;

        if ($preferences) {
            // Destination preference scoring
            if ($preferences->preferred_destinations &&
                in_array($package->destination->name, $preferences->preferred_destinations)) {
                $score += 30;
            }

            // Budget preference scoring
            if ($preferences->budget_range) {
                $score += $this->scoreBudgetMatch($package->package_price, $preferences->budget_range);
            }

            // Duration preference scoring
            if ($preferences->preferred_duration &&
                in_array($package->duration, $preferences->preferred_duration)) {
                $score += 25;
            }

            // Travel style scoring (based on package description keywords)
            if ($preferences->travel_style) {
                $score += $this->scoreTravelStyleMatch($package, $preferences->travel_style);
            }

            // Activities scoring
            if ($preferences->activities) {
                $score += $this->scoreActivitiesMatch($package, $preferences->activities);
            }

            // Accommodation preference
            if ($preferences->accommodation_type && $package->accommodation) {
                if (stripos($package->accommodation, $preferences->accommodation_type) !== false) {
                    $score += 15;
                }
            }

            // Avoid destinations
            if ($preferences->avoid_destinations &&
                in_array($package->destination->name, $preferences->avoid_destinations)) {
                $score -= 50;
            }
        }

        // Booking history analysis
        if ($bookingHistory->isNotEmpty()) {
            $score += $this->scoreBasedOnHistory($package, $bookingHistory);
        }

        // Seasonal and trending boost
        $score += $this->getSeasonalBoost($package);

        // Random factor to add variety (small)
        $score += rand(0, 5);

        return max(0, $score); // Ensure non-negative score
    }

    /**
     * Score package based on budget preference
     */
    private function scoreBudgetMatch(float $packagePrice, string $budgetPreference): float
    {
        $budgetRanges = [
            'budget' => [0, 150],
            'standard' => [150, 400],
            'luxury' => [400, 1000]
        ];

        $range = $budgetRanges[$budgetPreference] ?? [0, 1000];

        if ($packagePrice >= $range[0] && $packagePrice <= $range[1]) {
            return 25;
        }

        // Partial score for nearby ranges
        $distance = min(abs($packagePrice - $range[0]), abs($packagePrice - $range[1]));
        return max(0, 25 - ($distance / 50));
    }

    /**
     * Score based on travel style keywords
     */
    private function scoreTravelStyleMatch(Package $package, array $travelStyles): float
    {
        $score = 0;
        $description = strtolower($package->package_description ?? '');

        $styleKeywords = [
            'adventure' => ['adventure', 'hiking', 'trekking', 'climbing', 'rafting', 'extreme'],
            'relaxation' => ['relaxing', 'spa', 'peaceful', 'tranquil', 'calm', 'beach'],
            'cultural' => ['cultural', 'heritage', 'traditional', 'historic', 'museum', 'temple'],
            'family' => ['family', 'kids', 'children', 'playground', 'safe', 'friendly'],
            'romantic' => ['romantic', 'couples', 'honeymoon', 'sunset', 'intimate', 'cozy']
        ];

        foreach ($travelStyles as $style) {
            if (isset($styleKeywords[$style])) {
                foreach ($styleKeywords[$style] as $keyword) {
                    if (strpos($description, $keyword) !== false) {
                        $score += 5;
                    }
                }
            }
        }

        return min($score, 20); // Cap at 20 points
    }

    /**
     * Score based on activity preferences
     */
    private function scoreActivitiesMatch(Package $package, array $activities): float
    {
        $score = 0;
        $description = strtolower($package->package_description ?? '');

        foreach ($activities as $activity) {
            if (strpos($description, strtolower($activity)) !== false) {
                $score += 8;
            }
        }

        return min($score, 25); // Cap at 25 points
    }

    /**
     * Score based on user's booking history
     */
    private function scoreBasedOnHistory(Package $package, Collection $bookingHistory): float
    {
        $score = 0;

        // Analyze past booking patterns
        $avgPrice = $bookingHistory->avg('total_price') / $bookingHistory->avg('num_people');
        $avgDuration = $bookingHistory->avg('duration');

        // Price similarity boost
        $priceDiff = abs($package->package_price - $avgPrice);
        $score += max(0, 15 - ($priceDiff / 20));

        // Duration similarity boost
        $durationDiff = abs($package->duration - $avgDuration);
        $score += max(0, 10 - $durationDiff);

        // Destination diversity (slight preference for new places)
        $bookedDestinations = $bookingHistory->pluck('package.destination.name')->filter();
        if (!$bookedDestinations->contains($package->destination->name)) {
            $score += 8;
        }

        return $score;
    }

    /**
     * Get seasonal and trending boost
     */
    private function getSeasonalBoost(Package $package): float
    {
        // Simple seasonal logic - can be enhanced
        $month = now()->month;
        $boost = 0;

        // Winter destinations boost in winter months
        if (in_array($month, [12, 1, 2])) {
            if (stripos($package->package_description ?? '', 'winter') !== false ||
                stripos($package->package_description ?? '', 'snow') !== false) {
                $boost += 5;
            }
        }

        // Summer destinations boost in summer
        if (in_array($month, [6, 7, 8])) {
            if (stripos($package->package_description ?? '', 'beach') !== false ||
                stripos($package->package_description ?? '', 'summer') !== false) {
                $boost += 5;
            }
        }

        return $boost;
    }

    /**
     * Get reasons for recommendation
     */
    private function getRecommendationReasons(Package $package, ?UserPreference $preferences, Collection $bookingHistory): array
    {
        $reasons = [];

        if ($preferences) {
            if ($preferences->preferred_destinations &&
                in_array($package->destination->name, $preferences->preferred_destinations)) {
                $reasons[] = 'Matches your preferred destination';
            }

            if ($preferences->budget_range) {
                $budgetRanges = [
                    'budget' => [0, 150],
                    'standard' => [150, 400],
                    'luxury' => [400, 1000]
                ];
                $range = $budgetRanges[$preferences->budget_range] ?? [0, 1000];
                if ($package->package_price >= $range[0] && $package->package_price <= $range[1]) {
                    $reasons[] = 'Perfect for your ' . $preferences->budget_range . ' budget';
                }
            }

            if ($preferences->preferred_duration &&
                in_array($package->duration, $preferences->preferred_duration)) {
                $reasons[] = 'Ideal duration for you';
            }
        }

        if ($bookingHistory->isNotEmpty()) {
            $reasons[] = 'Based on your booking history';
        }

        if (empty($reasons)) {
            $reasons[] = 'Popular choice among travelers';
        }

        return $reasons;
    }
}
