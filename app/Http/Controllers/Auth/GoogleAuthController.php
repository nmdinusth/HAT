<?php

namespace App\Http\Controllers\Auth;

use Throwable;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\clients\UserInformation;
use App\Models\clients\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        // $url = Socialite::driver('google')->redirect()->getTargetUrl();
        // dd($url); // Xem URL thực tế gửi đến Google có chứa redirect_uri không
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // dd($googleUser->getEmail());

            $user = User::where('provider', 'google')
                ->where('provider_id', $googleUser->getId())
                ->first();

            if ($user) {
                // ✅ Đăng nhập user đã từng login Google
                Auth::login($user);
                return redirect()->intended('/');
            }

            // Tìm user đã từng đăng ký bằng email (không thông qua Google)
            $userByEmail = User::where('email', $googleUser->getEmail())->first();

            // dd($userByEmail);

            if ($userByEmail) {
                // ✅ Gán provider info cho user cũ
                $userByEmail->provider = 'google';
                $userByEmail->provider_id = $googleUser->getId();
                $userByEmail->save();
                
                Auth::login($userByEmail);
                return redirect()->intended('/');
            }

            // ✅ Chưa có user => tạo mới
            $newUser = User::create([
                'username' => explode('@', $googleUser->getEmail())[0] . '_' . Str::random(4), // lấy username từ email + chuỗi ngẫu nhiên tránh trùng
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(16)), // không dùng nhưng tránh null
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
                'status' => 'active',
                'role_id' => CUSTOMER_ROLE_ID,
            ]);

            UserInformation::create([
                'user_id' => $newUser->id,
                'name' => $googleUser->getName(),
                'avatar' => $googleUser->getAvatar(),
            ]);

            Auth::login($newUser);
            return redirect()->intended('/');
        } catch (Throwable $th) {
            return redirect('/')->with('error', 'Google login failed: ' . $th->getMessage());
        }
    }
}
