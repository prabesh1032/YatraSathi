<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'preferred_destinations',
        'travel_style',
        'budget_range',
        'preferred_duration',
        'activities',
        'accommodation_type',
        'transportation_preference',
        'group_size_preference',
        'avoid_destinations',
        'special_requirements',
        'preferences_completed',
    ];

    protected $casts = [
        'preferred_destinations' => 'array',
        'travel_style' => 'array',
        'preferred_duration' => 'array',
        'activities' => 'array',
        'avoid_destinations' => 'array',
        'transportation_preference' => 'boolean',
        'preferences_completed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
