<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    protected $booking;

    public function __construct()
    {
        $this->booking = new Booking();
    }

    // Tạo booking khách sạn
    public function createBooking(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|integer',
            'room_id' => 'required|integer',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);
        $userId = session('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Bạn chưa đăng nhập!'], 401);
        }
        $data = [
            'user_id' => $userId,
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guests' => $request->guests,
            'total_price' => $request->total_price,
            'status' => 'pending',
        ];
        $booking = $this->booking->create($data);
        // Gửi email xác nhận (nếu có email user)
        // ...
        return response()->json(['success' => true, 'message' => 'Đặt phòng thành công!', 'booking' => $booking]);
    }

    // Xem lịch sử booking khách sạn
    public function history(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login.form');
        }
        $bookings = $this->booking->where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return view('clients.partials.Hotel_booking.booking_history', compact('bookings'));
    }

    // Xem chi tiết booking
    public function detail($id)
    {
        $userId = session('user_id');
        $booking = $this->booking->where('id', $id)->where('user_id', $userId)->firstOrFail();
        return view('clients.partials.Hotel_booking.booking_detail', compact('booking'));
    }

    // Hủy booking
    public function cancel($id)
    {
        $userId = session('user_id');
        $booking = $this->booking->where('id', $id)->where('user_id', $userId)->firstOrFail();
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Không thể hủy booking đã xác nhận hoặc đã hoàn thành.');
        }
        $booking->status = 'cancelled';
        $booking->save();
        return redirect()->back()->with('success', 'Đã hủy booking thành công.');
    }
} 