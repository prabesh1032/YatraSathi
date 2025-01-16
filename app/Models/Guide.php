<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'photopath', 'package_id','email'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
