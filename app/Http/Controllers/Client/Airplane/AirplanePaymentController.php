<?php

namespace App\Http\Controllers\Client\Airplane;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirplanePaymentController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');
        $depart = $request->query('depart');
        $return = $request->query('return');
        $passenger = $request->query('passenger');
        $flight_code = $request->query('flight_code');
        $type = $request->query('type');
        $seats = $request->query('seats');
        $total_price = $request->query('total_price');
        $title = 'Thanh toán vé máy bay';

        $this->addBreadcrumb($title, route('airplane-payment', $request->query()));

        return view('clients.partials.Airplane_booking.airplane-payment', compact(
            'from',
            'to', 
            'depart',
            'return',
            'passenger',
            'flight_code',
            'type',
            'seats',
            'total_price',
            'title'
        ));
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:vnpay,momo,paypal',
            'from' => 'required|string',
            'to' => 'required|string',
            'depart' => 'required|date',
            'return' => 'nullable|date',
            'passenger' => 'required|integer|min:1',
            'flight_code' => 'required|string',
            'type' => 'required|string',
            'seats' => 'required|string',
            'total_price' => 'required|numeric|min:0'
        ]);

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
                    'message' => 'Đặt vé thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.'
                ]);
        }
    }
} 