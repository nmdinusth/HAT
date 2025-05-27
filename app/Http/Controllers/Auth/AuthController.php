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

    public function login (Request $request) {
        // Cải tiến chức năng đăng nhập lên
    }
}
