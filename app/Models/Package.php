<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'starting_location',
        'duration',
        'price',
        'photopath',
        'description',
        'latitude',
        'longitude'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function guides()
    {
        return $this->hasMany(Guide::class);
    }
    // Package Model
public function users()
{
    return $this->belongsToMany(User::class, 'user_package', 'package_id', 'user_id');
}

}
