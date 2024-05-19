<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
