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
        // Tạm thời trả về dữ liệu fake để tránh lỗi do thiếu bảng booking
        return [
            'countBooking' => 0,
            'totalAmount' => 0,
        ];
    }

    // Đã xóa toàn bộ các hàm và code liên quan đến tour, booking, doanh thu, v.v.

}
