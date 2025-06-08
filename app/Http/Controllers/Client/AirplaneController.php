<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AirplaneBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AirplaneController extends Controller
{
    public function createBooking(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'depart' => 'required|date',
            'return' => 'nullable|date|after_or_equal:depart',
            'passenger' => 'required|integer|min:1',
            'email' => 'required|email',
            'phone' => 'required',
            'id_type' => 'required',
            'id_number' => 'required',
            'id_expiry' => 'required|date',
            'nationality' => 'required',
            'gender' => 'required',
            'payment_method' => 'required|in:vnpay,momo,paypal',
        ]);

        $booking = AirplaneBooking::create($validated);

        // Gửi email xác nhận
        Mail::to($booking->email)->send(new \App\Mail\BookingConfirmed($booking));

        // Xử lý thanh toán giả lập
        switch ($validated['payment_method']) {
            case 'vnpay':
                return response()->json([
                    'success' => true,
                    'message' => 'Đặt vé thành công! Chuyển đến cổng thanh toán VNPay (giả lập).',
                    'payment_url' => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'
                ]);
            case 'momo':
                return response()->json([
                    'success' => true,
                    'message' => 'Đặt vé thành công! Chuyển đến cổng thanh toán Momo (giả lập).',
                    'payment_url' => 'https://test-payment.momo.vn/v2/gateway/api/create'
                ]);
            case 'paypal':
                return response()->json([
                    'success' => true,
                    'message' => 'Đặt vé thành công! Chuyển đến cổng thanh toán Paypal (giả lập).',
                    'payment_url' => 'https://www.sandbox.paypal.com/cgi-bin/webscr'
                ]);
            default:
                return response()->json([
                    'success' => true,
                    'message' => 'Đặt vé thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.',
                    'booking_id' => $booking->id
                ]);
        }
    }

    public function index()
    {
        return view('clients.airplane', [
            'title' => 'Dịch vụ hàng không'
        ]);
    }
} 