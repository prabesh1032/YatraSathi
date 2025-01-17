<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = ['user_id', 'package_id', 'guide_id', 'num_people', 'total_price', 'duration'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function guide()
    {
        return $this->belongsTo(Guide::class, 'guide_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
