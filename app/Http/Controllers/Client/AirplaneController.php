<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirplaneController extends Controller
{
    public function index()
    {
        $title = 'Airplane';
        return view('clients.airplane', compact('title'));
    }

    public function createBooking(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'depart' => 'required|date',
            'return' => 'nullable|date|after_or_equal:depart',
            'passenger' => 'required|integer|min:1'
        ]);

        // Here you would typically:
        // 1. Save the booking to database
        // 2. Process payment
        // 3. Send confirmation email
        // For now, we'll just return a success message
        
        return response()->json([
            'success' => true,
            'message' => 'Đặt vé thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.'
        ]);
    }
} 