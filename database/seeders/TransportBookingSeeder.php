<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('transport_bookings')->insert([
            [
                'user_id' => 1,
                'trip_type' => 'airport_dropoff',
                'airport' => 'Noi Bai',
                'pickup_time' => '2024-07-01 08:00:00',
                'pickup_address' => '123 Đường ABC, Hà Nội',
                'dropoff_address' => 'Sân bay Nội Bài',
                'car_type' => 'Sedan',
                'price' => 350000,
                'contact_name' => 'Nguyen Van A',
                'contact_phone' => '0123456789',
                'contact_email' => 'test@example.com',
                'contact_notes' => 'Không hút thuốc',
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'trip_type' => 'fixedpoint',
                'airport' => null,
                'pickup_time' => '2024-07-02 09:30:00',
                'pickup_address' => '456 Đường DEF, Hà Nội',
                'dropoff_address' => '789 Đường XYZ, Hải Phòng',
                'car_type' => 'SUV',
                'price' => 800000,
                'contact_name' => 'Tran Thi B',
                'contact_phone' => '0987654321',
                'contact_email' => 'test2@example.com',
                'contact_notes' => null,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
