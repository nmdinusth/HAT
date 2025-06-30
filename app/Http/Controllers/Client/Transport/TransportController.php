<?php

namespace App\Http\Controllers\Client\Transport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $title = 'Dịch vụ đưa đón';
        $this->addBreadcrumb($title, route('transport'));
        return view('clients.partials.Transport_booking.transport', compact('title'));
    }

    public function bookingForm()
    {
        $title = 'Đặt xe';
        $this->addBreadcrumb($title, route('booking.transport'));
        return view('clients.partials.Transport_booking.transport_booking', compact('title'));
    }
} 