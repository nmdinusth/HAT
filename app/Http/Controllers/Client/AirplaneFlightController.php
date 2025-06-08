<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirplaneFlightController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');
        $depart = $request->query('depart');
        $return = $request->query('return');
        $passenger = $request->query('passenger');

        // Danh sách chuyến bay giả lập
        $flights = [
            [
                'airline' => 'Bamboo Airways',
                'from' => $from,
                'to' => $to,
                'depart_time' => '08:00',
                'arrive_time' => '10:00',
                'price' => 1500000,
                'flight_code' => 'QH202',
                'date' => $depart,
            ],
            [
                'airline' => 'Vietnam Airlines',
                'from' => $from,
                'to' => $to,
                'depart_time' => '14:30',
                'arrive_time' => '16:30',
                'price' => 1700000,
                'flight_code' => 'VN123',
                'date' => $depart,
            ],
            [
                'airline' => 'Vietjet Air',
                'from' => $from,
                'to' => $to,
                'depart_time' => '19:00',
                'arrive_time' => '21:00',
                'price' => 1200000,
                'flight_code' => 'VJ456',
                'date' => $depart,
            ],
        ];

        $title = 'Danh Sách Chuyến Bay';
        return view('clients.airplane-flights', compact('flights', 'from', 'to', 'depart', 'return', 'passenger', 'title'));
    }
}
