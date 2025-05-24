<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    protected $table = 'tours';

    public function getHometours()
    {
        // Lấy thông tin tour
        $tours = DB::table($this->table)
            ->where('availability', operator: 1)
            ->take(8)
            ->get();

        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURl');

            // Tạo instance của Tours và gọi reviewStats
            $toursModel = new tours();
            $tour->rating = $toursModel->reviewStats($tour->tourID)->averageRating;
        }

        return $tours;
    }
}
