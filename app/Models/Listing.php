<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

}
