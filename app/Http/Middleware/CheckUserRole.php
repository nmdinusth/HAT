<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra session username
        if (!$request->session()->has('username')) {
            toastr()->error('Vui lòng đăng nhập để thực hiện.', 'Thông báo');
            return redirect()->route('login');
        }
        $username = $request->session()->get('username');
        $user = DB::table('users')->where('username', $username)->first();
        if (!$user || $user->role_id != (defined('CUSTOMER_ROLE_ID') ? CUSTOMER_ROLE_ID : 2)) {
            toastr()->error('Bạn không có quyền truy cập chức năng này.', 'Thông báo');
            return redirect()->route('home');
        }
        return $next($request);
    }
} 