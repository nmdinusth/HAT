<?php

namespace App\Models\clients;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Login extends Model
{
    use HasFactory;

    protected $table = 'users';

    // Xử lý đăng nhập
    public function login($account)
    {
        $getUser = DB::table($this->table) 
        ->where('username', $account['username'])
        ->first();

        if(!$getUser) {
            return false;
        }

        if(Hash::check($account['password'], $getUser->password)) {
            return $getUser;
        }

        return false;
    }

    // Kiểm tra trạng thái tài khoản
    public function checkStatus ($account) {
        $status = $account->status;

        if($status === 'active') {
            return true;
        }

        if($status === 'pending') {
            return 0;
        }

        return false;
    }

    // Kiểm tra xác thực 2 bước 2fa
    public function checkTwofaEnable ($account) {
        $status = $account->is_2fa_enabled;
        if ($status == true) {
            return 0; // trang otp
        }
        return false;
    }

    //Đăng ký người dùng mới
    public function registerAcount($data)
    {
        return DB::table($this->table)->insert($data);
    }
    //Kiểm tra username or email người dùng đã tồn tại hay chưa return true false
    public function checkUserExist($username, $email)
    {
        $check = DB::table($this->table)
            ->where('username', $username)
            ->orWhere('email', $email)
            ->exists();

        return $check;
    }

    // Kiểm tra người dùng tồn tại theo token kích hoạt
    public function getUserByToken($token){
        return DB::table($this->table)->where('activation_token', $token)->first();
    }

    // Cập nhật thông tin kích hoạt tài khoản
    public function activateUserAccount($token)
    {
        return DB::table($this->table)
            ->where('activation_token', $token)
            ->update(['activation_token' => null, 'isActive' => 'y']);
    }


    //Login with google
    public function checkUserExistGoogle($google_id){
        $check = DB::table($this->table)
        ->where('google_id', $google_id)->first();

        return $check;
    }
}

