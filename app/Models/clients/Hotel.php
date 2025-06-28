<?php

namespace App\Models\clients;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'hotels';

    // chuẩn lại tên 
    public function normalizeLocation($location)
    {
        // Chuyển sang ASCII và loại bỏ dấu
        $ascii = Str::ascii(trim($location));

        // Chuyển thành chữ thường
        $lowercase = strtolower($ascii);

        // Thay thế khoảng trắng và các ký tự không phải chữ cái/số bằng dấu gạch ngang
        $slug = preg_replace('/[^a-z0-9]+/', '-', $lowercase);

        // Loại bỏ dấu gạch ngang ở đầu và cuối
        return trim($slug, '-');
    }

    // Lọc theo khu vực và số lượng khách
    public function locationCondition($inputLocation, $adults, $children, $totalGuests)
    {
        $slug = Str::slug($inputLocation);

        // 1. Tìm khách sạn chính xác
        $mainHotel = Hotel::where('slug', $slug)
                ->where('is_active', true)
                ->first();

        if ($mainHotel) {
            // 2. Tìm các khách sạn liên quan (cùng thành phố, nhưng khác khách sạn chính)
            $relatedHotels = Hotel::where('city_id', $mainHotel->city_id)
                ->where('id', '!=', $mainHotel->id)
                ->where('is_active', true)
                ->take(5)
                ->get();

            return [
                'type' => 'hotel',
                'main' => $mainHotel,
                'related' => $relatedHotels,
            ];
        }

        // 3. Nếu không phải tên khách sạn → tìm theo thành phố (slug hóa cached_city_name)
        $hotelsByCity = Hotel::with([
            'bookings.bookingRooms.room.roomType',
            'roomTypes'
        ])
            ->where('cached_city_name', $slug)
            ->where('is_active', true)
            ->get();
        

        if ($hotelsByCity->count()) {

            // 4. Lọc khách sạn có roomType theo số người 
            foreach ($hotelsByCity as $hotel) {
                dd($hotel->roomTypes);
            }
            return [
                'type' => 'area',
                'hotels' => $hotelsByCity, //Có thể xử lý vị trí khách sạn theo đánh giá hoặc yếu tố khác ở đây
            ];
        }

        // 4. Không tìm thấy
        return [
            'message' => 'Không tìm thấy khách sạn hoặc khu vực phù hợp.',
        ];
    }

    public function dateCondition($checkInDate, $checkOutDate, $hotels)
    {
        foreach ($hotels as $hotel ) {
            
        }
        return 0;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
