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

        $is_2fa_enabled = $this->login->checkTwofaEnable($user_login);
        if($is_2fa_enabled == false) {
            $request->session()->put('username', $username);
            // $request->session()->put('avatar', $user->avatar);
            toastr()->success("Đăng nhập thành công!",'Thông báo');
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công!',
                'redirectUrl' => route('home'),  // Optional: dynamic home route
            ]);
        }
    }
}
