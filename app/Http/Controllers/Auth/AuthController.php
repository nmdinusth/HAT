<?php

namespace App\Http\Controllers\Auth;

use App\Models\clients\User;
use Illuminate\Http\Request;
use App\Models\clients\Login;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private $login;
    protected $user;

    public function __construct()
    {
        $this->login = new Login();
        $this->user = new User();
    }
    public function index()
    {
        $title = 'Đăng nhập';
        return view('clients.login', compact('title'));
    }

    //Xử lý người dùng đăng nhập
    public function login (Request $request) {
        $username = $request->username;
        $password = $request->password;

        $data_login = [
            'username' => $username,
            'password' => $password,
        ];

        $user_login = $this->login->login($data_login); //Trả về true: thông tin tài khoản đúng, false tk or mk sai
        if ($user_login == false) {
            return response()->json([
                'success' => false,
                'message' => 'Thông tin tài khoản không chính xác!',
            ]);
        } 

        $status_user = $this->login->checkStatus($user_login);
        if ($status_user == false) {
            return response()->json([
                'success' => false,
                'message' => 'Tài khoản hiện tại của bạn đang bị khóa!',
            ]);
        } 

        $user_id = $this->user->getUserId($username);
        $is_2fa_enabled = $this->login->checkTwofaEnable($user_login);
        if($is_2fa_enabled == false) {
            $request->session()->put('username', $username);
            $request->session()->put('user_id', $user_id);
            // $request->session()->put('avatar', $user->avatar);
            toastr()->success("Đăng nhập thành côngg!",'Thông báo');
            return redirect()->route('home');
        }
    }

    // Xử lý người dùng đăng xuất
    public function logout (Request $request) {
        // Xóa session lưu trữ thông tin người dùng đã đăng nhập
        $request->session()->forget('username');
        $request->session()->forget('userId');
        toastr()->success("Đăng xuất thành côngg!",'Thông báo');
        return redirect()->route('home');
    }

    // Hiển thị trang xác thực 2 bước
    public function showOtpForm () {

        // return view('otp-verification');
        echo "helloo";
    }

    // Xử lý OTP được gửi về
    public function verifyOtp (Request $request) {
        $request->validate(['otpCode' => 'required|digits:6']);
        // Xử lý, xác nhận otp trong server, xem đã hết hạn chưa,....

        $user = $this->user->find( $request->userID);
        $serveOTP = $user->otp; // Mã otp đã gửi cho user
        $otpCode = $request->otpCode; //Mã otp được gửi từ user
    }
}
