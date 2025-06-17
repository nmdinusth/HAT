<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $title = 'Transport';
        return view('clients.transport', compact('title'));
    }

    public function bookingForm()
    {
        $title = 'Booking Transport';
        return view('clients.booking_transport', compact('title'));
    }
} 