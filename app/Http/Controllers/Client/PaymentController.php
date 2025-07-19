<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Request $request)
    {
        $type = $request->query('type');
        $bookingId = $request->query('booking_id');
        // Lấy dữ liệu booking từ session (demo), thực tế sẽ lấy từ DB
        $booking = session('transport_booking');
        return view('clients.payment', [
            'type' => $type,
            'booking' => $booking,
            'form_action' => '#', // cập nhật route xử lý thanh toán thực tế
            'customer' => []
        ]);
    }
} 