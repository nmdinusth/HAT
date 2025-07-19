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

    public function storeBooking(Request $request)
    {
        // Validate và lưu booking (giả lập, bạn thay bằng logic thực tế)
        $booking = [
            'id' => 1, // booking_id giả lập
            'car_type' => $request->input('car_type', '5 seats (Standard)'),
            'pickup_address' => $request->input('pickup_address', 'Đón'),
            'pickup_time' => $request->input('pickup_time', '10/07/2025, 12:00'),
            'contact_name' => $request->input('contact_name', 'Nguyen Van B'),
            'contact_phone' => $request->input('contact_phone', '0123456789'),
            'contact_email' => $request->input('contact_email', 'b@gmail.com'),
            'total_price' => $request->input('total_price', 500000),
        ];
        // Lưu booking vào session để demo (bạn thay bằng DB thực tế)
        session(['transport_booking' => $booking]);
        // Redirect sang trang thanh toán chung
        return redirect()->route('payment', [
            'type' => 'transport',
            'booking_id' => $booking['id']
        ]);
    }
} 