<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Models\clients\User;
use Illuminate\Http\Request;
use App\Models\clients\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\clients\UserInformation;

class AuthController extends Controller
{
    private $login;
    protected $user;
    protected $user_information;

    public function __construct()
    {
        $this->login = new Login();
        $this->user = new User();
        $this->user_information = new UserInformation();
    }

    public function login(Request $request)
{ // Tự validate thủ công (không dùng $request->validate())
    $errors = [];

    if (empty($request->username)) {
        $errors['username'] = ['Please enter your username'];
    }

    if (empty($request->password)) {
        $errors['password'] = ['Please enter your password'];
    }

    // Nếu có lỗi, trả về ngay với status 'warning'
    if (!empty($errors)) {
        return response()->json([
            'status' => 'warning',  // <-- Quan trọng: Dùng status warning
            // 'message' => 'Thông tin không hợp lệ',
            'errors' => $errors     // Chi tiết lỗi (có thể dùng để highlight field)
        ], 422);
    };

    $user = $this->user::where('username', $request->username)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Incorrect username or password',
            'username' => $request->username // Trả về username để giữ lại trên form
        ], 401); // 401: Unauthorized
    }

    Auth::login($user);
    return response()->json([
        'status' => 'success',
        'message' => 'Login successful',
        'redirect' => '/' // Thêm redirect nếu cần
    ]);
}

    // public function index()
    // {
    //     $title = 'Đăng nhập';
    //     return view('clients.login', compact('title'));
    // }

    public function register(Request $request)
    {
        $name = $request->name;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

        // Kiểm tra tên người dùng hoặc email đã tồn tại hay chưa
        $checkAccountExist = $this->login->checkUserExist($username, $email);
        if ($checkAccountExist) {
            return response()->json([
                'debug' => [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'checkAccountExist' => $checkAccountExist,
                ],
                'success' => false,
                'message' => 'Tên người dùng hoặc email đã tồn tại!'
            ]);
        }

        $email_verification_token = Str::random(60); //Tạo token 
        $email_verification_expires_at = now()->addMinutes(15); //Tạo thời gian hết hạn token 

        // Thực hiện đăng ký tài khoản
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'email_verification_token' => $email_verification_token,
            'email_verification_expires_at' => $email_verification_expires_at
        ];
        $user = $this->login->registerAcount($data);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi tạo người dùng',
            ]);
        }

        // Gửi token xác nhận
        $this->login->sendActivationEmail(
            $email,
            $email_verification_token,
            $email_verification_expires_at
        );
        session()->put('email', $email);

        return redirect()->route('activate.notification');
    }

    // Trang thông báo kích hoạt tài khoản
    public function showActivateNotification()
    {
        $title = 'Kích hoạt tài khoản';
        $email = session('email');
        return view('clients.token-verification', compact('title', 'email'));
    }

    //Xử lý gửi mail xác thực
    public function sendMailActivate()
    {
        $email = session('email');
        $email_verification_token = Str::random(60); //Tạo token 
        $email_verification_expires_at = now()->addMinutes(15); //Tạo thời gian hết hạn token 

        $user = $this->user->getUserByEmail($email);
        $user_id = $user->id;

        $data = [
            'email_verification_token' => $email_verification_token,
            'email_verification_expires_at' => $email_verification_expires_at,
        ];

        $this->user->updateUser($user_id, $data);

        // Gửi token xác nhận
        $this->login->sendActivationEmail(
            $email,
            $email_verification_token,
            $email_verification_expires_at
        );
    }

    // Xác nhận lại token
    public function activateAccount($token)
    {
        $user = $this->login->getUserByToken($token);
        if ($user) {
            $this->login->activateUserAccount($token);

            return redirect('/dang-nhap')->with('message', 'Tài khoản của bạn đã được kích hoạt!');
        } else {
            return redirect('/dang-nhap')->with('error', 'Mã kích hoạt không hợp lệ!');
        }
    }

    //Xử lý người dùng đăng nhập
    // public function login (Request $request) {
    //     $username = $request->username;
    //     $password = $request->password;

    //     $data_login = [
    //         'username' => $username,
    //         'password' => $password,
    //     ];

    //     $user_login = $this->login->login($data_login); //Trả về true: thông tin tài khoản đúng, false tk or mk sai
    //     if ($user_login == false) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Thông tin tài khoản không chính xác!',
    //         ]);
    //     } 

    //     $status_user = $this->login->checkStatus($user_login);
    //     if ($status_user == false) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Tài khoản hiện tại của bạn đang bị khóa!',
    //         ]);
    //     } 

    //     $user_id = $this->user->getUserId($username);
    //     $email = $user_login->email;
    //     $email_masked = $this->user->maskEmail($email);
    //     $is_2fa_enabled = $this->login->checkTwofaEnable($user_login);
    //     if($is_2fa_enabled == false) {
    //         $request->session()->put('username', $username);
    //         $request->session()->put('user_id', $user_id);
    //         // $request->session()->put('avatar', $user->avatar);
    //         toastr()->success("Đăng nhập thành côngg!",'Thông báo');
    //         return redirect()->route('home');
    //     } else {
    //         $request->session()->put('email', $email);
    //         $request->session()->put('email_masked', $email_masked);
    //         return redirect()->route('2fa_show'); //->with('email', $email);
    //     }
    // }

    // Xử lý người dùng đăng xuất
    public function logout(Request $request)
    {
        // Xóa session lưu trữ thông tin người dùng đã đăng nhập
        $request->session()->forget('username');
        $request->session()->forget('user_id');
        $request->session()->forget('email');
        $request->session()->forget('email_masked');
        toastr()->success("Đăng xuất thành côngg!", 'Thông báo');
        return redirect()->route('home');
    }

    // Hiển thị trang xác thực 2 bước
    public function showOtpForm(Request $request)
    {
        $email_masked = session('email_masked'); // Lấy email từ session
        return view('clients.otp-verification', compact('email_masked'));
    }

    // Xử lý gửi lại otp 2fa
    public function sendOtp2fa(Request $request)
    {
        $email = session('email');
        $this->login->sendOtp2fa($email);
        // toastr()->success("Đã gửi lại mã OTP!",'Thông báo');
        // return redirect()->back();
    }

    // Xử lý OTP được gửi về
    public function verifyOtp(Request $request)
    {
        $request->validate(['otpCode' => 'required|digits:6']); //otp phải đủ 6 số
        // Xử lý, xác nhận otp trong server, xem đã hết hạn chưa,....
        $otpCode = $request->otpCode; //Mã otp được gửi từ user
        $email = $request->email; //Mã email được gửi từ user

        $user = $this->user->getUserByEmail($email);
        if (!$user) {
            return response()->json([
                'status' => 'user_not_found',
                'message' => 'Người dùng không tồn tại.'
            ], 404);
        }

        $effect = now()->lt($user->otp_expires_at); //true nếu còn hiệu lực
        $effect = now()->gt($user->otp_expires_at); //true nếu hết hạn
        if ($effect || !$user->otp_expires_at) {
            return response()->json([
                'status' => 'otp_expired',
                'message' => 'Mã OTP đã hết hạn.'
            ], 400);
        }

        $serveOTP = $user->otp_code; // Mã otp đã gửi cho user
        $compare = $otpCode === $serveOTP;
        if (!$compare) {
            return response()->json([
                'status' => 'otp_invalid',
                'message' => 'Mã OTP không hợp lệ.'
            ], 400);
        }

        session()->put('user_id', $user->id);
        session()->put('username', $user->username);

        $data = [
            'otp_code' => null,
            'otp_expires_at' => null,
        ];
        $this->user->updateUser($user->id, $data);

        // toastr()->success('Xác thực OTP và đăng nhập thành công!', 'Thành công');
        // return redirect()->route('home');

        return response()->json([
            // 'debug' => [
            //     'serveOTP' => $user->otp_code,
            //     'otpCode' => $otpCode,
            //     'compare' => $compare
            // ],
            'status' => 'success',
            'message' => 'Xác thực OTP thành công.',
            'redirect' => route('home'), // gửi URL cho frontend
        ]);

    }
}
