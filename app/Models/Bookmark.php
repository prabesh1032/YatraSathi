<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = ['user_id', 'package_id', 'num_people', 'total_price'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

