<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'package_id',
        'guide_id',
        'name',
        'address',
        'phone',
        'num_people',
        'payment_method',
        'total_price',
        'status',
        'duration',
        'travel_date',
        'cancellation_status',
        'cancelled_at',
        'custom_package_name',
        'custom_package_location',
        'custom_package_type',
        'is_custom_package',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function guide()
    {
        return $this->belongsTo(Guide::class, 'guide_id');
    }
}
