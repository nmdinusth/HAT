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
    public function hotelSearchResult()
    {
        $hotels = Hotel::where('is_active', true)->get();
        return view('clients.partials.Hotel_booking.hotel-search-result', compact('hotels'));
    }
    public function hotelSingle(Request $request)
    {
        $hotelId = $request->get('hotel_id');
        $hotel = Hotel::with(['amenities'])->findOrFail($hotelId);
        return view('clients.partials.Hotel_booking.hotel-single', compact('hotel'));
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
    public function confirmPayment()
    {
        return view('clients.partials.Hotel_booking.confirm_payment');
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
    
    
    

    public function findHotel(Request $request) {
        dd($request->all()); //Kiểm tra dữ liệu đầu vào
        $input_location = $this->hotel->normalizeLocation($request->location); // Đà Nẵng -> da nang

        $date_range = $this->booking->splitDateRange($request->daterange);
        $check_in_date = $date_range['check_in_date'];
        $check_out_date = $date_range['check_out_date'];

        $adult_number = $request->adult_number;
        $child_number = $request->child_number;
        $total_guests = $adult_number + $child_number;
        $room_number = $request->room_number;

        // 1. Xử lý Danh sách khách sạn theo tên hoặc khu vực 
        $hotels = $this->hotel->locationCondition($input_location);
        // dd($hotels); //Ko trả về khách sạn phù hợp sẽ gây lỗi Undefined array key "hotels"
        // Khách sạn EgLoad với roomType
        $hotels_roomType = $hotels['hotels']->load('roomTypes.rooms');
        // Xử lý name là khu vực trước 
        if ($hotels['type'] === 'area') {
            $result_guest_condition = $this->hotel->guestCondition($hotels_roomType, $adult_number, $child_number, $total_guests);
        };
        dd($result_guest_condition);
    }
}
