<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirplaneBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('airplane_bookings')->insert([
            [
                'from' => 'hanoi',
                'to' => 'danang',
                'depart' => '2024-07-01',
                'return' => '2024-07-05',
                'passenger' => 2,
                'email' => 'test1@example.com',
                'phone' => '0123456789',
                'id_type' => 'passport',
                'id_number' => 'A1234567',
                'id_expiry' => '2030-01-01',
                'nationality' => 'Vietnam',
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'from' => 'hochiminh',
                'to' => 'nhatrang',
                'depart' => '2024-08-10',
                'return' => null,
                'passenger' => 1,
                'email' => 'test2@example.com',
                'phone' => '0987654321',
                'id_type' => 'cccd',
                'id_number' => 'B7654321',
                'id_expiry' => '2029-12-31',
                'nationality' => 'Vietnam',
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
