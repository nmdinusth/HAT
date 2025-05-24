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
            ->select('userId')
            ->where('username', $username)->value('userId');
    }
    public function getUser($id)
    {
        $users = DB::table($this->table)
            ->where('userId', $id)->first();

        return $users;
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
