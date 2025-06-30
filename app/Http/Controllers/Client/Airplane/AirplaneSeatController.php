<?php

namespace App\Http\Controllers\Client\Airplane;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirplaneSeatController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');
        $depart = $request->query('depart');
        $return = $request->query('return');
        $passenger = $request->query('passenger');
        $flight_code = $request->query('flight_code');
        $type = $request->query('type', 'domestic');

        // Giá mẫu cho từng hạng ghế
        $seat_prices = [
            'economy' => 1200000,
            'business' => 2500000
        ];

        $title = 'Chọn Ghế Máy Bay';
        $this->addBreadcrumb($title, route('airplane-seat-select', $request->query()));
        return view('clients.partials.Airplane_booking.airplane-seat-select', compact('from', 'to', 'depart', 'return', 'passenger', 'flight_code', 'type', 'seat_prices', 'title'));
    }
}
