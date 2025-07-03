<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirplaneSeatHold;
use Illuminate\Support\Carbon;

class AirplaneSeatHoldController extends Controller
{
    // API lấy trạng thái ghế của 1 chuyến bay
    public function seatStatus(Request $request)
    {
        $flight_code = $request->query('flight_code');
        if (!$flight_code) {
            return response()->json(['error' => 'Missing flight_code'], 400);
        }
        // Xóa các hold đã hết hạn
        AirplaneSeatHold::where('flight_code', $flight_code)
            ->where('status', 'hold')
            ->where('hold_expires_at', '<', now())
            ->delete();
        // Lấy trạng thái ghế còn hiệu lực
        $seats = AirplaneSeatHold::where('flight_code', $flight_code)
            ->whereIn('status', ['hold', 'booked'])
            ->get(['seat_code', 'status', 'user_session', 'hold_expires_at']);
        $result = [];
        foreach ($seats as $seat) {
            $result[$seat->seat_code] = [
                'status' => $seat->status,
                'user_session' => $seat->user_session,
                'hold_expires_at' => $seat->hold_expires_at,
            ];
        }
        return response()->json($result);
    }

    // API giữ ghế (hold seat)
    public function holdSeat(Request $request)
    {
        $flight_code = $request->input('flight_code');
        $seat_code = $request->input('seat_code');
        $user_session = $request->input('user_session');
        if (!$flight_code || !$seat_code || !$user_session) {
            return response()->json(['error' => 'Missing params'], 400);
        }
        // Kiểm tra ghế đã bị giữ hoặc đặt chưa
        $exists = AirplaneSeatHold::where('flight_code', $flight_code)
            ->where('seat_code', $seat_code)
            ->whereIn('status', ['hold', 'booked'])
            ->where('hold_expires_at', '>', now())
            ->exists();
        if ($exists) {
            return response()->json(['error' => 'Seat already held or booked'], 409);
        }
        // Giữ ghế 10 phút
        $hold = AirplaneSeatHold::create([
            'flight_code' => $flight_code,
            'seat_code' => $seat_code,
            'status' => 'hold',
            'user_session' => $user_session,
            'hold_expires_at' => now()->addMinutes(10),
        ]);
        return response()->json(['success' => true, 'hold' => $hold]);
    }
}
