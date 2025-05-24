<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardModel extends Model
{
    use HasFactory;

    public function getSummary()
    {
        $tourWorking = DB::table('tours')
            ->where('availability', 1)
            ->count();
        $countBooking = DB::table('booking')
            ->where('bookingStatus', '!=', 'c')
            ->count();
        $totalAmount = DB::table('checkout')
            ->where('paymentStatus', 'y')
            ->sum('amount');

        // Trả về mảng chứa các dữ liệu tổng hợp
        return [
            'tourWorking' => $tourWorking,
            'countBooking' => $countBooking,
            'totalAmount' => $totalAmount,
        ];
    }

    public function getValueDomain()
    {
        // Lấy số lượng tours cho mỗi miền (b, t, n)
        return DB::table('tours')
            ->select(DB::raw('domain, COUNT(*) as count'))
            ->whereIn('domain', ['b', 't', 'n'])  // Chỉ lấy các miền có domain b, t, n
            ->groupBy('domain')  // Nhóm theo domain
            ->get()
            ->pluck('count', 'domain');  // Trả về mảng với key là domain và value là count
    }

    public function getValuePayment()
    {
        return DB::table('checkout')
            ->select('paymentMethod', DB::raw('COUNT(*) as count'))
            ->groupBy('paymentMethod')
            ->get()
            ->toArray();
    }

    public function getMostTourBooked()
    {
        return DB::table('tours')
            ->join('booking', 'tours.tourId', '=', 'booking.tourId')
            ->select('tours.tourId', 'tours.title', 'tours.quantity', DB::raw('SUM(booking.numAdults + booking.numChildren) as booked_quantity'))
            ->groupBy('tours.tourId', 'tours.quantity', 'tours.title')
            ->orderByDesc(DB::raw('SUM(booking.numAdults + booking.numChildren)')) // Sắp xếp theo số lượng đặt tour giảm dần
            ->take(3) // Lấy 3 tour có số lượng đặt cao nhất
            ->get();
    }

    public function getNewBooking()
    {
        return DB::table('booking')
            ->join('tours', 'booking.tourId', '=', 'tours.tourId')
            ->where('booking.bookingStatus', 'b')
            ->orderByDesc('booking.bookingDate')
            ->select('booking.*', 'tours.title as tour_name') // Chọn tất cả các cột từ tbl_booking và thêm tên tour từ tbl_tours
            ->take(3)
            ->get();

    }

    public function getRevenuePerMonth()
    {
        $monthlyRevenue = DB::table('booking')
            ->select(DB::raw('MONTH(bookingDate) as month, SUM(totalPrice) as revenue'))
            ->where('bookingStatus', 'y')
            ->groupBy(DB::raw('MONTH(bookingDate)'))
            ->orderBy('month', 'asc')
            ->get();

        // Chuẩn bị mảng doanh thu với 12 tháng
        $revenueData = array_fill(0, 12, 0);  // Mảng chứa doanh thu cho 12 tháng

        // Gán doanh thu cho từng tháng
        foreach ($monthlyRevenue as $data) {
                $revenueData[$data->month - 1] = $data->revenue;  // Gán doanh thu cho tháng tương ứng
        }

        return $revenueData;
    }



}
