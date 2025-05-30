<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';


    public function getUserId($username)
    {
        return DB::table($this->table)
            ->select('id')
            ->where('username', $username)->value('id');
    }
    public function getUser($id)
    {
        $users = DB::table($this->table)
            ->where('id', $id)->first();

        return $users;
    }
    // Hash 50% cái email này lại nào
    public function maskEmail($email) {
   
    $parts = explode('@', $email); // Tách email thành 2 phần tại ký tự '@'
    $userName = $parts[0];// Phần trước @ (username)
    $domain = $parts[1] ?? '';// Phần sau @ (domain), nếu không có thì gán bằng chuỗi rỗng

    // Che giấu username:
    // - Giữ lại 3 ký tự đầu
    // - Thay các ký tự còn lại bằng dấu *
    // - Đảm bảo ít nhất 1 dấu * được thêm vào
    $maskedUsername = substr($userName, 0, 3) . str_repeat('*', max(strlen($userName) - 3, 1));
    
    // Ghép username đã che giấu với domain
    return $maskedUsername . '@' . $domain;
}

    public function updateUser($id, $data)
    {
        $update = DB::table($this->table)
            ->where('userid', $id)
            ->update($data);

        return $update;
    }

    public function getMyTours($id)
    {
        $myTours =  DB::table('booking')
        ->join('tours', 'booking.tourID', '=', 'tours.tourID')
        ->join('checkout', 'booking.bookingID', '=', 'checkout.bookingID')
        ->where('booking.userID', $id)
        ->orderByDesc('booking.bookingDate')
        ->take(3)
        ->get();

        foreach ($myTours as $tour) {
            // Lấy rating từ tbl_reviews cho mỗi tour
            $tour->rating = DB::table('reviews')
                ->where('tourID', $tour->tourID)
                ->where('userID', $id)
                ->value('rating'); // Dùng value() để lấy giá trị rating
        }
        foreach ($myTours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURl');
        }

        return $myTours;
    }
}
