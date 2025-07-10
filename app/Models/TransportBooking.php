<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportBooking extends Model
{
    use HasFactory;

    protected $table = 'transport_bookings';
    protected $guarded = [];
} 