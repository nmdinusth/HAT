<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirplaneBookingController extends Controller
{
    public function showBookingForm(Request $request)
    {
        $type = $request->query('type', 'domestic');
        $title = 'Đặt vé máy bay';
        return view('clients.airplane-booking', compact('type', 'title'));
    }
} 