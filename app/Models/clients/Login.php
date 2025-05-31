<?php

namespace App\Models\clients;

use App\Mail\OtpNofitication;
use App\Mail\TokenNofitication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            dd('Trang sẽ được đén trang xác nhận email');
            return 0;
        }

        return false;
    }

    // Kiểm tra xác thực 2 bước 2fa
    public function checkTwofaEnable ($account) {
        $status = $account->is_2fa_enabled;
        $email = $account->email;
        if ($status == true) {
            $otp_code = str_pad(random_int(0, 999999), 6, '0', pad_type: STR_PAD_LEFT); //Tạo otp 6 số random
            $otpExpiresAt = now()->addMinutes(15); // Thời gian hết hạn
            
            // Lưu otp và thời gian hết hạn vào email
            DB::table($this->table)->where('email', $email)
            ->update([
                'otp_code' => $otp_code,
                'otp_expires_at' => $otpExpiresAt,
            ]);
            // $account->otp_code = $otp_code;
            // $account->otp_expires_at = $otpExpiresAt;
            // $account->save();

            // Gửi otp về email
            Mail::to($email)->send(new OtpNofitication(
                $otp_code, 
                $otpExpiresAt
            ));
            
            return true;
        }
        return false;
    }

    // Xử lý gửi OTP
    public function sendOtp2fa ($email) {
        $otp_code = str_pad(random_int(0, 999999), 6, '0', pad_type: STR_PAD_LEFT); //Tạo otp 6 số random
        $otpExpiresAt = now()->addMinutes(15); // Thời gian hết hạn
        
        // Lưu otp và thời gian hết hạn vào email
        DB::table($this->table)->where('email', $email)
        ->update([
            'otp_code' => $otp_code,
            'otp_expires_at' => $otpExpiresAt,
        ]);
        
        Mail::to($email)->send(new OtpNofitication(
            $otp_code, 
            $otpExpiresAt
        ));
    }

    //Xử lý gửi mail xác thực token
    public function sendActivationEmail($email, $token) {
        $activation_link = route('activate.account', ['token' => $token]);

        Mail::to($email)->send(new TokenNofitication(
            $activation_link,
        ));
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
        return DB::table($this->table)->where('email_verification_token', $token)->first();
    }

    // Cập nhật thông tin kích hoạt tài khoản
    public function activateUserAccount($token)
    {
        return DB::table($this->table)
            ->where('email_verification_token', $token)
            ->update(['email_verification_token' => null, 'status' => 'active']);
    }


    //Login with google
    public function checkUserExistGoogle($google_id){
        $check = DB::table($this->table)
        ->where('google_id', $google_id)->first();

        return $check;
    }
}

