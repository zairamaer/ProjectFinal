<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'user_id', 'image', 'location']; // Add 'location' to $fillable

    // Accessor for location
    public function getLocationAttribute($value)
    {
        return ucfirst($value); // Example: Capitalize the location before returning
    }

    // Mutator for location
    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = strtolower($value); // Example: Convert location to lowercase before saving
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
