<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'destination_id', 'start_date', 'end_date', 'guests', 'total_price'
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}


