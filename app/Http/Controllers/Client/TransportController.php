<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $title = 'Transport';
        return view('clients.partials.Transport_booking.transport', compact('title'));
    }

    public function bookingForm()
    {
        $title = 'Booking Transport';
        return view('clients.partials.Transport_booking.booking_transport', compact('title'));
    }
} 