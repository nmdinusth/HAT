<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirplaneBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'depart',
        'return',
        'passenger',
        'email',
        'phone',
        'id_type',
        'id_number',
        'id_expiry',
        'nationality',
        'gender',
    ];
} 