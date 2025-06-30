<?php

namespace App\Http\Controllers\Client\Airplane;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirplaneBookingController extends Controller
{
    public function showBookingForm(Request $request)
    {
        $type = $request->query('type', 'domestic');
        $title = 'Đặt vé máy bay';
        return view('clients.partials.Airplane_booking.airplane-booking', compact('type', 'title'));
    }
} 