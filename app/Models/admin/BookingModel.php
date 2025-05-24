<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'booking';

    public function getBooking(){

        $list_booking = DB::table($this->table)
        ->join('tours', 'tours.tourId', '=', 'booking.tourId')
        ->join('checkout', 'booking.bookingId', '=', 'checkout.bookingId')
        ->orderByDesc('bookingDate')
        ->get();

        return $list_booking;
    }

    public function updateBooking($bookingId, $data){
        return DB::table($this->table)
        ->where('bookingId',$bookingId)
        ->update($data);
    }

    public function getInvoiceBooking($bookingId){

        $invoice = DB::table($this->table)
        ->join('tours', 'tours.tourId', '=', 'booking.tourId')
        ->join('checkout', 'booking.bookingId', '=', 'checkout.bookingId')
        ->where('booking.bookingId', $bookingId)
        ->first();

        return $invoice;
    }

    public function updateCheckout($bookingId, $data){
        return DB::table('checkout')
        ->where('bookingId',$bookingId)
        ->update($data);
    }
}
