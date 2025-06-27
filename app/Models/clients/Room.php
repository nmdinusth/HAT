<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bookingRooms () {
        return $this->hasMany(BookingRoom::class);
    }
    public function roomtype () {
        return $this->belongsTo(RoomType::class);
    }
}
