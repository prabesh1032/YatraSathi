<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'duration', 'people', 'price', 'photopath', 'description'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}



