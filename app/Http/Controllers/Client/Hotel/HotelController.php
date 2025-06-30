<?php

namespace App\Http\Controllers\Client\Hotel;

use Str;
use Illuminate\Http\Request;
use App\Models\clients\Hotel;
use App\Models\clients\Booking;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    protected $hotel;
    protected $booking;
    public function __construct()
    {
        $this->hotel = new Hotel;
        $this->booking = new Booking;
    }

    public function index()
    {
        $title = 'Khách sạn';

        return view('clients.partials.Hotel_booking.home', compact('title'));
    }
    public function roomSearchResult()
    {
        // $title = 'Khách sạn';

        return view('clients.partials.Hotel_booking.room-search-result');
    }
    public function roomSearchResultList()
    {
        // $title = 'Khách sạn';

        return view('clients.partials.Hotel_booking.room-search-result-list');
    }
    public function roomDetail()
    {
        // $title = 'Khách sạn';

        return view('clients.partials.Hotel_booking.room-detail');
    }
    public function cart()
    {
        // $title = 'Khách sạn';

        return view('clients.partials.Hotel_booking.cart');
    }
    public function checkout()
    {
        // $title = 'Khách sạn';

        return view('clients.partials.Hotel_booking.checkout');
    }

    public function findHotel(Request $request)
    {
        // dd($request->all());
        // (1) : Tên địa điểm như Hà Nội hoặc tên Khách Sạn
        // (2) : Ngày đến và đi - Tách riêng ra để lưu vào
        // (3) : Số người và số phòng
        // Tách sô người thành số và cụ thể 
        // số phòng để tìm kiếm dựa trên khách sạn nữa - khách sạn nào còn từng đấy phòng yêu cầu

        $input_location = $this->hotel->normalizeLocation($request->location); // Đà Nẵng -> da nang

        // Cách sử dụng đúng:
        $ranger_date = $this->booking->splitDateRange($request->ranger_date);
        $check_in_date = $ranger_date['check_in_date']; // Truy cập bằng key
        $check_out_date = $ranger_date['check_out_date'];

        $GaR = $this->booking->parseGuestsAndRooms($request->guests_and_rooms);
        $adults = $GaR['adults']; //Số người lớn
        $children = $GaR['children']; // Số trẻ em
        $total_guests = $GaR['total_guests']; // Tổng số người
        $rooms = $GaR['rooms']; // Tổng số phòng

        //Ta sẽ tìm theo tên khách sạn trước sau đó nếu không phải thì chắc chắn sẽ là tên khu vực 
        $hotels = $this->hotel->locationCondition($input_location, $adults, $children, $total_guests);
        // dd($hotel['type']);

        // Xử lý name là khu vực trước 
        if ($hotels['type'] === 'area') {
            $hotels = $this->hotel->dateCondition($check_in_date, $check_out_date, $hotels['hotels']);
        };

    }
}
