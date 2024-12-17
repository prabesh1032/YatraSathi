<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveller extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'package_id', 'travel_date', 'review', 'payment_status'];

    // Relationship to Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

