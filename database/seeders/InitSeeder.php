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
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'customer'],
        ]);

        // ĐĂNG NHẬP - Note (eamil hiện tại đang không có unique)
        // trường hợp đã xác nhận email chưa bật 2fa
        // trường hợp đã xác nhận email bật 2fa
        // trường hợp chưa xác nhận email
        DB::table('users')->insert([
            [
                'username' => 'dinhDuc',
                'email' => 'nguyendinhduc.yb.k03@gmail.com',
                'password' => Hash::make('123456'),
                'status' => 'active',
                'is_2fa_enabled' => false,
                'role_id' => CUSTOMER_ROLE_ID,
            ],
            // [
            //     'username' => 'minhDuc', 
            //     'email' => 'dien email của anh vaooo',
            //     'password' => Hash::make('dien mat khau vao day '),
            //     'status' => 'active', // de active mà dang nhap, dang ky em chua lam
            //     'is_2fa_enabled' => true, // true thì xác thực 2 bước đưuọc gửi otp qua mail, false thì đăng nhập thẳng
            //     'role_id' => CUSTOMER_ROLE_ID,
            // ],
        ]);

        DB::table('cities')->insert([
            ['id' => 1, 'name' => 'Hà Nội', 'slug' => 'ha-noi'],
            ['id' => 2, 'name' => 'Thành phố Hồ Chí Minh', 'slug' => 'thanh-pho-ho-chi-minh'],
            ['id' => 3, 'name' => 'Đà Nẵng', 'slug' => 'da-nang'],
        ]);

        DB::table('districts')->insert([
            ['city_id' => 1, 'name' => 'Quận Hoàn Kiếm', 'slug' => 'quan-hoan-kiem'],
            ['city_id' => 1, 'name' => 'Quận Cầu Giấy', 'slug' => 'quan-cau-giay'],
            ['city_id' => 1, 'name' => 'Quận Ba Đình', 'slug' => 'quan-ba-dinh'],

            ['city_id' => 2, 'name' => 'Quận 1', 'slug' => 'quan-1'],
            ['city_id' => 2, 'name' => 'Quận 3', 'slug' => 'quan-3'],
            ['city_id' => 2, 'name' => 'Thành phố Thủ Đức', 'slug' => 'thanh-pho-thu-duc'],

            ['city_id' => 3, 'name' => 'Quận Hải Châu', 'slug' => 'quan-hai-chau'],
            ['city_id' => 3, 'name' => 'Quận Sơn Trà', 'slug' => 'quan-son-tra'],
            ['city_id' => 3, 'name' => 'Quận Ngũ Hành Sơn', 'slug' => 'quan-ngu-hanh-son'],
        ]);
    }
}
