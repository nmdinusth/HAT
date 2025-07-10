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
        DB::table('users')->insert([
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => Hash::make('123456'),
                'status' => 'active',
                'is_2fa_enabled' => false,
                'role_id' => $userRoleId,
            ],
            [
                'username' => 'user2',
                'email' => 'user2@example.com',
                'password' => Hash::make('123456'),
                'status' => 'active',
                'is_2fa_enabled' => false,
                'role_id' => $userRoleId,
            ],
        ]);

        // Seed admin
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            [
                'userName' => 'admin',
                'password' => md5('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
