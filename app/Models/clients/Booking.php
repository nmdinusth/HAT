<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'bookings';

    // Hàm splitDateRange được cải tiến
    public function splitDateRange($data)
    {
        $result = [
            'check_in_date' => '',
            'check_out_date' => ''
        ];

        if (empty($data)) {
            return $result;
        }

        $parts = explode(" đến ", $data);

        if (count($parts) === 2) {
            // Thêm validate ngày tháng
            $checkIn = trim($parts[0]);
            $checkOut = trim($parts[1]);

            if (strtotime($checkIn) && strtotime($checkOut)) {
                $result['check_in_date'] = $checkIn;
                $result['check_out_date'] = $checkOut;
            }
        }

        return $result;
    }

    //Tách guests_and_rooms
    function parseGuestsAndRooms($input)
    {
        // Khởi tạo giá trị mặc định
        $result = [
            'adults' => 0,
            'children' => 0,
            'total_guests' => 0,
            'rooms' => 1
        ];

        if (empty($input)) {
            return $result;
        }

        // Tách các phần bằng dấu phẩy
        $parts = array_map('trim', explode(',', $input));

        foreach ($parts as $part) {
            // Tách số và loại (người lớn/trẻ em/phòng)
            $itemParts = preg_split('/\s+/', trim($part), 2);
            $count = (int) $itemParts[0];
            $type = strtolower($itemParts[1] ?? '');

            if (strpos($type, 'người lớn') !== false || strpos($type, 'adult') !== false) {
                $result['adults'] = $count;
            } elseif (strpos($type, 'trẻ em') !== false || strpos($type, 'child') !== false) {
                $result['children'] = $count;
            } elseif (strpos($type, 'phòng') !== false || strpos($type, 'room') !== false) {
                $result['rooms'] = $count;
            }
        }

        // Tính tổng số khách
        $result['total_guests'] = $result['adults'] + $result['children'];

        return $result;
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
    public function bookingRooms() {
        return $this->hasMany(BookingRoom::class);
    }
}
