<?php

namespace App\Http\Controllers\Client\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function __construct()
    {
       
    }

    public function index () {
        $title = 'Khách sạn';

        return view('clients.hotels.home', compact('title'));
    }

    public function findHotel (Request $request) {
        dd($request->all());
    }
}
