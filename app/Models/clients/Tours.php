<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tours extends Model
{
    use HasFactory;

    protected $table = 'tours';

    //Lấy tất cả tours
    public function getAllTours($perPage = 9)
    {

        $allTours = DB::table($this->table)->where('availability', 1)->paginate($perPage);
        foreach ($allTours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURl');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourID)->averageRating;
        }

        return $allTours;
    }
    // //Lấy chi tiết tour
    public function getTourDetail($id)
    {
        $getTourDetail = DB::table($this->table)
            ->where('tourID', $id)
            ->first();

        if ($getTourDetail) {
            // Lấy danh sách hình ảnh thuộc về tour
            $getTourDetail->images = DB::table('images')
                ->where('tourID', $getTourDetail->tourID)
                ->limit(5)
                ->pluck('imageURl');

            // Lấy danh sách timeline thuộc về tour
            $getTourDetail->duration = DB::table('timeline')
                ->where('tourID', $getTourDetail->tourID)
                ->get();
        }


        return $getTourDetail;
    }

    //Lấy khu vực đến Bắc - Trung - Nam
    function getDomain()
    {
        return DB::table($this->table)
            ->select('domain', DB::raw('COUNT(*) as count'))
            ->where('availability', 1)
            ->whereIn('domain', ['b', 't', 'n'])
            ->groupBy('domain')
            ->get();
    }

    //Filter tours
    public function filterTours($filters = [], $sorting = null, $perPage = null)
    {
        DB::enableQueryLog();

        // Khởi tạo truy vấn với bảng tours
        $getTours = DB::table($this->table)
            ->leftJoin('reviews', 'tours.tourID', '=', 'reviews.tourID') // Join với bảng reviews
            ->select(
                'tours.tourID',
                'tours.title',
                'tours.description',
                'tours.quantity',
                'tours.priceAdult',
                'tours.priceChild',
                'tours.duration', 
                'tours.destination',   
                'tours.startDate',
                'tours.endDate',
                'tours.domain',
                DB::raw('AVG(reviews.rating) as averageRating')
            )
            ->groupBy(
                'tours.tourID',
                'tours.title',
                'tours.description',
                'tours.priceAdult',
                'tours.priceChild',
                'tours.time',
                'tours.destination',
                'tours.domain',
                'tours.quantity'
            );
        $getTours = $getTours->where('availability', 1);

        if (!empty($filters)) {
            foreach ($filters as $filter) {
                if ($filter[0] !== 'averageRating') {
                    $getTours = $getTours->where($filter[0], $filter[1], $filter[2]);
                }
            }
        }

        // Áp dụng điều kiện về averageRating trong phần HAVING
        if (!empty($filters)) {
            foreach ($filters as $filter) {
                if ($filter[0] === 'averageRating') {
                    $getTours = $getTours->having('averageRating', $filter[1], $filter[2]); // Sử dụng HAVING để lọc averageRating
                }
            }
        }

        if (!empty($sorting) && isset($sorting[0]) && isset($sorting[1])) {
            $getTours = $getTours->orderBy($sorting[0], $sorting[1]);
        }

        // Thực hiện truy vấn để ghi log
        $tours = $getTours->get();

        // In ra câu lệnh SQL đã ghi lại (nếu cần thiết)
        $queryLog = DB::getQueryLog();

        // Lấy danh sách hình ảnh cho mỗi tour
        foreach ($tours as $tour) {
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourId)
                ->pluck('imageURl');
            $tour->rating = $this->reviewStats($tour->tourId)->averageRating;
        }

        // dd($queryLog); // In ra log truy vấn nếu cần thiết
        return $tours;
    }

    public function updateTours($tourID, $data)
    {
        $update = DB::table($this->table)
            ->where('tourID', $tourID)
            ->update($data);

        return $update;
    }

    //Lấy detail tour đã đặt
    public function tourBooked($bookingID, $checkoutID)
    {
        $booked = DB::table($this->table)
            ->join('booking', 'tours.tourID', '=', 'booking.tourID')
            ->join('checkout', 'booking.bookingID', '=', 'checkout.bookingID')
            ->where('booking.bookingID', '=', $bookingID)
            ->where('checkout.checkoutID', '=', $checkoutID)
            ->first();

        return $booked;
    }


    //Tạo đánh giá về tours
    public function createReviews($data)
    {
        return DB::table('reviews')->insert($data);
    }

    //Lấy danh sách nội dung reviews
    public function getReviews($id)
    {
        $getReviews = DB::table('reviews')
            ->join('users', 'users.userID', '=', 'reviews.userID')
            ->where('tourID', $id)
            ->orderBy('reviews.createdTimestamp','desc')
            ->take(3)
            ->get();

        return $getReviews;
    }

    //Lấy số lượng đánh giá và số sao trung bình của tour
    public function reviewStats($id)
    {
        $reviewStats = DB::table('reviews')
            ->where('tourID', $id)
            ->selectRaw('AVG(rating) as averageRating, COUNT(*) as reviewCount')
            ->first();

        return $reviewStats;
    }

    //Kiểm tra xem người dùng đã đánh giá tour này hay chưa?

    public function checkReviewExist($tourID, $userID)
    {
        return DB::table('reviews')
            ->where('tourID', $tourID)
            ->where('userID', $userID)
            ->exists(); // Trả về true nếu bản ghi tồn tại, false nếu không tồn tại
    }

    //Search tours
    public function searchTours($data)
    {
        $tours = DB::table($this->table);


        // Thêm điều kiện cho destination với LIKE
        if (!empty($data['destination'])) {
            $tours->where('destination', 'LIKE', '%' . $data['destination'] . '%');
        }

        // Thêm điều kiện cho startDate và endDate nếu cần so sánh
        if (!empty($data['startDate'])) {
            $tours->whereDate('startDate', '>=', $data['startDate']);
        }
        if (!empty($data['endDate'])) {
            $tours->whereDate('endDate', '<=', $data['endDate']);
        }

        // Thêm điều kiện tìm kiếm với LIKE cho title, time và description
        if (!empty($data['keyword'])) {
            $tours->where(function ($query) use ($data) {
                $query->where('title', 'LIKE', '%' . $data['keyword'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $data['keyword'] . '%')
                    ->orWhere('time', 'LIKE', '%' . $data['keyword'] . '%')
                    ->orWhere('destination', 'LIKE', '%' . $data['keyword'] . '%');
            });
        }

        $tours = $tours->where('availability', 1);
        $tours = $tours->limit(12)->get();

        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURl');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourID)->averageRating;
        }
        return $tours;
    }

    //Get tours recommendation
    public function toursRecommendation($ids)
    {

        if (empty($ids)) {
            // Return an empty collection to avoid executing the query with an empty `FIELD` clause
            return collect();
        }

        $toursRecom = DB::table($this->table)
            ->where('availability', '1')
            ->whereIn('tourID', $ids)
            ->orderByRaw("FIELD(tourID, " . implode(',', array_map('intval', $ids)) . ")") // Chuyển tất cả các giá trị sang kiểu int và giữ thứ tự
            ->get();
        foreach ($toursRecom as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURl');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourID)->averageRating;
        }

        return $toursRecom;
    }

    //Get tour có số lượng booking và hoàn thành nhiều nhất để gợi ý
    // public function toursPopular($quantity)
    // {
    //     $toursPopular = DB::table('booking')
    //         ->select(
    //             'tours.tourID',
    //             'tours.title',
    //             'tours.description',
    //             'tours.priceAdult',
    //             'tours.priceChild',
    //             'tours.startDate',
    //             'tours.endDate',
    //             'tours.destination',
    //             'tours.quantity',
    //             DB::raw('COUNT(booking.tourId) as totalBookings')
    //         )
    //         ->join('tours', 'booking.tourID', '=', 'tours.tourID')
    //         ->where('booking.bookingStatus', 'f') // Chỉ lấy các booking đã hoàn thành
    //         ->groupBy(
    //             'tours.tourID',
    //             'tours.title',
    //             'tours.description',
    //             'tours.priceAdult',
    //             'tours.priceChild',
    //             'tours.startDate',
    //             'tours.endDate',
    //             'tours.destination',
    //             'tours.quantity'
    //         )
    //         ->orderBy('totalBookings', 'DESC')
    //         ->take($quantity)
    //         ->get();


    //     foreach ($toursPopular as $tour) {
    //         // Lấy danh sách hình ảnh thuộc về tour
    //         $tour->images = DB::table('images')
    //             ->where('tourID', $tour->tourID)
    //             ->pluck('imageURl');
    //         // Lấy số lượng đánh giá và số sao trung bình của tour
    //         $tour->rating = $this->reviewStats($tour->tourID)->averageRating;
    //     }
    //     return $toursPopular;
    // }

    //Get id search tours
    public function toursSearch($ids)
    {

        if (empty($ids)) {
            // Return an empty collection to avoid executing the query with an empty `FIELD` clause
            return collect();
        }

        $tourSearch = DB::table($this->table)
            ->where('availability', '1')
            ->whereIn('tourID', $ids)
            ->orderByRaw("FIELD(tourID, " . implode(',', array_map('intval', $ids)) . ")") // Chuyển tất cả các giá trị sang kiểu int và giữ thứ tự
            ->get();
        foreach ($tourSearch as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURl');
            // Lấy số lượng đánh giá và số sao trung bình của tour
            $tour->rating = $this->reviewStats($tour->tourID)->averageRating;
        }

        return $tourSearch;
    }

}
