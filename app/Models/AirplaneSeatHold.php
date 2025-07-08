<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirplaneSeatHold extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_code',
        'seat_code',
        'status',
        'user_session',
        'hold_expires_at',
    ];
}
