<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed roles
        DB::table('roles')->delete();
        $adminRoleId = DB::table('roles')->insertGetId(['name' => 'admin']);
        $userRoleId = DB::table('roles')->insertGetId(['name' => 'user']);

        // Seed users
        DB::table('users')->delete();
        $userId = DB::table('users')->insertGetId([
            'email' => 'nguyendinhduc.yb.k03@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 'active',
            'is_2fa_enabled' => false,
            'role_id' => $userRoleId,
            'name' => 'User Test',
        ]);
        $adminUserId = DB::table('users')->insertGetId([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'status' => 'active',
            'is_2fa_enabled' => false,
            'role_id' => $adminRoleId,
            'name' => 'Super Admin',
        ]);
        DB::table('user_information')->insert([
            'user_id' => $userId, // ID của user thường
            'name' => 'Nguyễn Văn A',
            'avatar' => 'https://example.com/avatar.jpg',
            'gender' => 'male',
            'dob' => '1990-01-15',
            'phone' => '0987654321',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('user_information')->insert([
            'user_id' => $adminUserId, // ID của user admin
            'name' => 'Super Admin',
            'avatar' => 'https://example.com/avatar-admin.jpg',
            'gender' => 'male',
            'dob' => '1990-01-01',
            'phone' => '0999999999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed cities an toàn, không insert id cố định, chỉ thêm nếu chưa có
        $cities = [
            ['name' => 'ha-noi', 'slug' => 'ha-noi'],
            ['name' => 'thanh-pho-ho-chi-minh', 'slug' => 'thanh-pho-ho-chi-minh'],
            ['name' => 'da-nang', 'slug' => 'da-nang'],
        ];
        foreach ($cities as $city) {
            if (!DB::table('cities')->where('slug', $city['slug'])->exists()) {
                DB::table('cities')->insert($city);
            }
        }

        // Seed districts an toàn (chỉ thêm nếu chưa có)
        $districts = [
            ['city_slug' => 'ha-noi', 'name' => 'quan-hoan-kiem', 'slug' => 'quan-hoan-kiem'],
            ['city_slug' => 'ha-noi', 'name' => 'quan-cau-giay', 'slug' => 'quan-cau-giay'],
            ['city_slug' => 'ha-noi', 'name' => 'quan-ba-dinh', 'slug' => 'quan-ba-dinh'],
            ['city_slug' => 'thanh-pho-ho-chi-minh', 'name' => 'quan-1', 'slug' => 'quan-1'],
            ['city_slug' => 'thanh-pho-ho-chi-minh', 'name' => 'quan-3', 'slug' => 'quan-3'],
            ['city_slug' => 'thanh-pho-ho-chi-minh', 'name' => 'thanh-pho-thu-duc', 'slug' => 'thanh-pho-thu-duc'],
            ['city_slug' => 'da-nang', 'name' => 'quan-hai-chau', 'slug' => 'quan-hai-chau'],
            ['city_slug' => 'da-nang', 'name' => 'quan-son-tra', 'slug' => 'quan-son-tra'],
            ['city_slug' => 'da-nang', 'name' => 'quan-ngu-hanh-son', 'slug' => 'quan-ngu-hanh-son'],
        ];
        foreach ($districts as $district) {
            $cityId = DB::table('cities')->where('slug', $district['city_slug'])->value('id');
            if ($cityId && !DB::table('districts')->where('slug', $district['slug'])->where('city_id', $cityId)->exists()) {
                DB::table('districts')->insert([
                    'city_id' => $cityId,
                    'name' => $district['name'],
                    'slug' => $district['slug'],
                ]);
            }
        }
        // Thêm dữ liệu cho bảng hotels an toàn (chỉ insert nếu chưa có slug)
        $hotels = [
            [
                'name' => 'Hilton Hanoi Opera',
                'slug' => 'hilton-hanoi-opera',
                'description' => 'Khách sạn 5 sao sang trọng tại trung tâm Hà Nội',
                'images' => json_encode(['hilton1.jpg', 'hilton2.jpg', 'hilton3.jpg']),
                'address' => '1 Lê Thánh Tông, Hoàn Kiếm',
                'district_id' => DB::table('districts')->where('slug', 'quan-hoan-kiem')->value('id'),
                'city_id' => DB::table('cities')->where('slug', 'ha-noi')->value('id'),
                'cached_city_name' => 'ha-noi',
                'latitude' => 21.021389,
                'longitude' => 105.855278,
                'phone_number' => '024 3933 0500',
                'email' => 'hanoiopera@hilton.com',
                'check_in_time' => '14:00',
                'check_out_time' => '12:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rex Hotel Saigon',
                'slug' => 'rex-hotel-saigon',
                'description' => 'Khách sạn biểu tượng của Sài Gòn với kiến trúc cổ điển',
                'images' => json_encode(['rex1.jpg', 'rex2.jpg']),
                'address' => '141 Nguyễn Huệ, Quận 1',
                'district_id' => DB::table('districts')->where('slug', 'quan-1')->value('id'),
                'city_id' => DB::table('cities')->where('slug', 'thanh-pho-ho-chi-minh')->value('id'),
                'cached_city_name' => 'thanh-pho-ho-chi-minh',
                'latitude' => 10.771944,
                'longitude' => 106.698056,
                'phone_number' => '028 3829 2185',
                'email' => 'info@rexhotelsaigon.com',
                'check_in_time' => '14:00',
                'check_out_time' => '12:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Furama Resort Danang',
                'slug' => 'furama-resort-danang',
                'description' => 'Khu nghỉ dưỡng bãi biển sang trọng tại Đà Nẵng',
                'images' => json_encode(['furama1.jpg', 'furama2.jpg', 'furama3.jpg']),
                'address' => '105 Võ Nguyên Giáp, Sơn Trà',
                'district_id' => DB::table('districts')->where('slug', 'quan-son-tra')->value('id'),
                'city_id' => DB::table('cities')->where('slug', 'da-nang')->value('id'),
                'cached_city_name' => 'da-nang',
                'latitude' => 16.039444,
                'longitude' => 108.251389,
                'phone_number' => '0236 3847 333',
                'email' => 'reservation@furamavietnam.com',
                'check_in_time' => '15:00',
                'check_out_time' => '11:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'JW Marriott Hanoi',
                'slug' => 'jw-marriott-hanoi',
                'description' => 'Khách sạn 5 sao tiêu chuẩn quốc tế tại khu vực Nam Từ Liêm',
                'images' => json_encode(['marriott1.jpg', 'marriott2.jpg', 'marriott3.jpg']),
                'address' => 'Số 8 Đỗ Đức Dục, Mễ Trì, Nam Từ Liêm',
                'district_id' => DB::table('districts')->where('slug', 'quan-cau-giay')->value('id'),
                'city_id' => DB::table('cities')->where('slug', 'ha-noi')->value('id'),
                'cached_city_name' => 'ha-noi',
                'latitude' => 21.008889,
                'longitude' => 105.780278,
                'phone_number' => '024 3833 5588',
                'email' => 'reservations.jwhanoi@marriott.com',
                'check_in_time' => '15:00',
                'check_out_time' => '12:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sofitel Legend Metropole Hanoi',
                'slug' => 'sofitel-metropole-hanoi',
                'description' => 'Khách sạn 5 sao lịch sử với kiến trúc Pháp cổ điển',
                'images' => json_encode(['metropole1.jpg', 'metropole2.jpg', 'metropole3.jpg']),
                'address' => '15 Ngô Quyền, Hoàn Kiếm',
                'district_id' => DB::table('districts')->where('slug', 'quan-hoan-kiem')->value('id'),
                'city_id' => DB::table('cities')->where('slug', 'ha-noi')->value('id'),
                'cached_city_name' => 'ha-noi',
                'latitude' => 21.025556,
                'longitude' => 105.858611,
                'phone_number' => '024 3826 6919',
                'email' => 'h1555@sofitel.com',
                'check_in_time' => '14:00',
                'check_out_time' => '12:00',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        foreach ($hotels as $hotel) {
            if (!DB::table('hotels')->where('slug', $hotel['slug'])->exists()) {
                // Chuyển đổi hotel_name thành name trước khi insert
                if(isset($hotel['hotel_name'])) {
                    $hotel['name'] = $hotel['hotel_name'];
                    unset($hotel['hotel_name']);
                }
                DB::table('hotels')->insert($hotel);
            }
        }

        // Thêm dữ liệu cho bảng room_types
        DB::table('room_types')->insert([
            [
                'hotel_id' => 1,
                'name' => 'Phòng Deluxe',
                'description' => 'Phòng rộng rãi với view thành phố',
                'base_price' => 2500000,
                'max_guest' => '3',
                'max_adult' => '2',
                'max_children' => '1',
                'size_sqm' => 35,
                'bed_type' => '1 giường đôi lớn',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'hotel_id' => 1,
                'name' => 'Phòng Executive Suite',
                'description' => 'Suite cao cấp với nhiều tiện nghi',
                'base_price' => 5000000,
                'max_guest' => '4',
                'max_adult' => '2',
                'max_children' => '2',
                'size_sqm' => 60,
                'bed_type' => '2 giường đôi lớn',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'hotel_id' => 2,
                'name' => 'Phòng Superior',
                'description' => 'Phòng tiêu chuẩn với view đường phố',
                'base_price' => 1800000,
                'max_guest' => '3',
                'max_adult' => '3',
                'max_children' => null,
                'size_sqm' => 28,
                'bed_type' => '3 giường đơn',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'hotel_id' => 3,
                'name' => 'Beachfront Villa',
                'description' => 'Villa riêng tư hướng biển',
                'base_price' => 8000000,
                'max_guest' => '4',
                'max_adult' => '2',
                'max_children' => '2',
                'size_sqm' => 120,
                'bed_type' => '2 giường đôi lớn',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Thêm dữ liệu cho bảng rooms
        DB::table('rooms')->insert([
            [
                'room_type_id' => 1,
                'name' => 'Deluxe 101',
                'room_number' => '101',
                'floor_number' => 1,
                'images' => json_encode(['deluxe101-1.jpg', 'deluxe101-2.jpg']),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'room_type_id' => 1,
                'name' => 'Deluxe 102',
                'room_number' => '102',
                'floor_number' => 1,
                'images' => json_encode(['deluxe102-1.jpg']),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'room_type_id' => 2,
                'name' => 'Executive Suite 501',
                'room_number' => '501',
                'floor_number' => 5,
                'images' => json_encode(['suite501-1.jpg', 'suite501-2.jpg', 'suite501-3.jpg']),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'room_type_id' => 3,
                'name' => 'Superior 201',
                'room_number' => '201',
                'floor_number' => 2,
                'images' => json_encode(['superior201-1.jpg']),
                'status' => 'maintenance',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'room_type_id' => 4,
                'name' => 'Beach Villa 1',
                'room_number' => 'BV1',
                'floor_number' => 1,
                'images' => json_encode(['villa1-1.jpg', 'villa1-2.jpg', 'villa1-3.jpg']),
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Thêm dữ liệu cho bảng amenities an toàn (chỉ insert nếu chưa có name)
        $amenities = [
            ['name' => 'Wifi', 'icon_class' => 'la la-wifi'],
            ['name' => 'Bể bơi', 'icon_class' => 'la la-swimming-pool'],
            ['name' => 'TV', 'icon_class' => 'la la-television'],
            ['name' => 'Điều hòa', 'icon_class' => 'la la-snowflake-o'],
            ['name' => 'Ăn sáng', 'icon_class' => 'la la-coffee'],
            ['name' => 'Đỗ xe', 'icon_class' => 'la la-car'],
            ['name' => 'Gym', 'icon_class' => 'la la-dumbbell'],
            ['name' => 'Spa', 'icon_class' => 'la la-spa'],
            ['name' => 'Nhà hàng', 'icon_class' => 'la la-cutlery'],
            ['name' => 'Bar', 'icon_class' => 'la la-glass'],
            ['name' => 'Hồ bơi trẻ em', 'icon_class' => 'la la-child'],
            ['name' => 'Lễ tân 24/7', 'icon_class' => 'la la-concierge-bell'],
            ['name' => 'Dịch vụ phòng', 'icon_class' => 'la la-bell'],
        ];
        foreach ($amenities as $amenity) {
            \App\Models\clients\Amenity::firstOrCreate(['name' => $amenity['name']], $amenity);
        }
        // Booking cho phòng 101 (28/6 - 30/6)
        DB::table('bookings')->insert([
            [
                'user_id' => $userId,
                'hotel_id' => 1,
                'booking_date' => '2023-06-25',
                'check_in_date' => '2023-06-28',
                'check_out_date' => '2023-06-30',
                'adults' => 2,
                'children' => 0,
                'rooms' => 1,
                'status' => 'confirmed',
                'total_amount' => 5000000, // 2 đêm x 2.500.000
                // 'payment_method' => 'credit_card',
                'deposit_amount' => 2500000,
                'amount_paid' => 5000000,
                'amount_due' => 0,
                'payment_status' => 'paid',
                'paid_at' => now(),
                'guest_name' => 'Nguyễn Văn A',
                'guest_email' => 'nguyenvana@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Booking cho phòng 102 (27/6 - 30/6)
            [
                'user_id' => $userId,
                'hotel_id' => 1,
                'booking_date' => '2023-06-24',
                'check_in_date' => '2023-06-27',
                'check_out_date' => '2023-06-30',
                'adults' => 2,
                'children' => 1,
                'rooms' => 1,
                'status' => 'confirmed',
                'total_amount' => 7500000, // 3 đêm x 2.500.000
                // 'payment_method' => 'bank_transfer',
                'deposit_amount' => 3750000,
                'amount_paid' => 7500000,
                'amount_due' => 0,
                'payment_status' => 'paid',
                'paid_at' => now(),
                'guest_name' => 'Trần Thị B',
                'guest_email' => 'tranthib@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Booking cho phòng 102 (2/7 - 4/7)
            [
                'user_id' => $userId,
                'hotel_id' => 1,
                'booking_date' => '2023-06-26',
                'check_in_date' => '2023-07-02',
                'check_out_date' => '2023-07-04',
                'adults' => 1,
                'children' => 0,
                'rooms' => 1,
                'status' => 'confirmed',
                'total_amount' => 5000000, // 2 đêm x 2.500.000
                // 'payment_method' => 'credit_card',
                'deposit_amount' => 2500000,
                'amount_paid' => 5000000,
                'amount_due' => 0,
                'payment_status' => 'paid',
                'paid_at' => now(),
                'guest_name' => 'Lê Văn C',
                'guest_email' => 'levanc@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        DB::table('booking_rooms')->insert([
            // Phòng 101 (28/6 - 30/6)
            [
                'booking_id' => 1,
                'room_id' => 1,
                'room_name' => 'Deluxe 101',
                'adults' => 2,
                'children' => 0,
                'special_request' => 'Yêu cầu giường king size',
                'price_per_night' => 2500000,
                'night' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Phòng 102 (27/6 - 30/6)
            [
                'booking_id' => 2,
                'room_id' => 2,
                'room_name' => 'Deluxe 102',
                'adults' => 2,
                'children' => 1,
                'special_request' => 'Thêm giường phụ cho trẻ em',
                'price_per_night' => 2500000,
                'night' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Phòng 102 (2/7 - 4/7)
            [
                'booking_id' => 3,
                'room_id' => 2,
                'room_name' => 'Deluxe 102',
                'adults' => 1,
                'children' => 0,
                'special_request' => 'Yêu cầu phòng không hút thuốc',
                'price_per_night' => 2500000,
                'night' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
