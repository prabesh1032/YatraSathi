<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Define the fillable properties
    protected $fillable = [
        'user_id',  // ID of the user triggering the notification
        'type',     // Type of the notification (Booking, Review, Payment)
        'content',  // Content of the notification (description)
        'is_read',  // If the notification has been read by the admin
    ];

    // Optionally, define a relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
