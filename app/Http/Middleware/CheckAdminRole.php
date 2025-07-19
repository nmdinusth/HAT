<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckAdminRole
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
        // Kiểm tra session admin
        if (!$request->session()->has('admin')) {
            toastr()->error('Vui lòng đăng nhập vào Admin để thực hiện.', 'Thông báo');
            return redirect()->route('admin.login');
        }
        $username = $request->session()->get('admin');
        $user = DB::table('users')->where('username', $username)->first();
        if (!$user || $user->role_id != (defined('ADMIN_ROLE_ID') ? ADMIN_ROLE_ID : 1)) {
            toastr()->error('Bạn không có quyền truy cập trang quản trị.', 'Thông báo');
            return redirect()->route('home');
        }
        return $next($request);
    }
} 