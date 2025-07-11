<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\clients\PayPalController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Client\Airplane\AirplaneController;
use App\Http\Controllers\clients\BookingController;
use App\Http\Controllers\admin\LoginAdminController;
use App\Http\Controllers\Client\Transport\TransportController;
use App\Http\Controllers\Client\Hotel\HotelController;
use App\Http\Controllers\clients\LoginGoogleController;
use App\Http\Controllers\clients\UserProfileController;
use App\Http\Controllers\admin\AdminManagementController;
use App\Http\Controllers\Client\Airplane\AirplaneBookingController;
use App\Http\Controllers\Client\Airplane\AirplaneFlightController;
use App\Http\Controllers\Client\Airplane\AirplaneSeatController;
use App\Http\Controllers\Client\Airplane\AirplanePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------- 
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HotelController::class, 'index'])->name('home');

//Handle Login New
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // hoặc route('home')
})->name('logout');
Route::get('/email-active', function () {
    return view('clients.partials.Hotel_booking.email-active-done');
});

Route::get('/xac-thuc-2-buoc', [AuthController::class, 'showOtpForm'])->name('2fa_show');
Route::post('/two-factor-auth', [AuthController::class, 'verifyOtp'])->name('2fa_verify');  
Route::post('/send-otp-2fa', [AuthController::class, 'sendOtp2fa'])->name('send_otp_2fa'); 

Route::get('activate-account/{token}', [AuthController::class, 'activateAccount'])->name('activate.account');
Route::get('/kich-hoat-tai-khoan', [AuthController::class, 'showActivateNotification'])->name('activate.notification');
Route::post('/send-mail-activate', [AuthController::class, 'sendMailActivate'])->name('send_mail_activate'); 


Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);

// Các route liên quan đến xử lý đặt phòng khách sạn

// Trang chủ tìm khách sạn
// Gọi hàm xử lý tìm phòng và trả danh sách phòng kèm khách sạn hiển thị ở homeSearchRestult
Route::post('/find-hotel', [HotelController::class, 'findHotel'])->name('hotel.find');
// View hiển thị kết quả tìm kiếm khách sạn 
Route::get('/hotel-search-result', [HotelController::class, 'hotelSearchResult']);
// View hiển thị thông tin khách sạn
Route::get('/hotel-single', [HotelController::class, 'hotelSingle']);
// View hiển thị thông tin phòng 
Route::get('/room-detail', [HotelController::class, 'roomDetail']);
// Hiển thị giỏ hàng phòng đã chọn nếu có
Route::get('/cart', [HotelController::class, 'cart']);
//Hiển thị view thanh toán chưa xử lý
Route::get('/checkout', [HotelController::class, 'checkout']);

// Các view khác nếu cần thiết
Route::get('/room-search-result', [HotelController::class, 'roomSearchResult']);
Route::get('/room-search-result-list', [HotelController::class, 'roomSearchResultList']);



//Handle user profile
Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user-profile')->middleware('checkLoginClient');
Route::post('/user-profile', [UserProfileController::class, 'update'])->name('update-user-profile');
Route::post('/change-password-profile', [UserProfileController::class, 'changePassword'])->name('change-password');
Route::post('/change-avatar-profile', [UserProfileController::class, 'changeAvatar'])->name('change-avatar');


//Hanlde checkout
Route::post('/booking/{id?}', [BookingController::class, 'index'])->name('booking')->middleware('checkLoginClient');
Route::post('/create-booking', [BookingController::class, 'createBooking'])->name('create-booking');
Route::get('/booking', [BookingController::class, 'handlePaymentMomoCallback'])->name('handlePaymentMomoCallback');

//Payment with paypal
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

//Payment with Momo
Route::post('/create-momo-payment', [BookingController::class, 'createMomoPayment'])->name('createMomoPayment');


//Search


//ADMIN
// Routes without middleware
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'index'])->name('admin.login');
    Route::post('/login-account', [LoginAdminController::class, 'loginAdmin'])->name('admin.login-account');
    Route::get('/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Management admin
    Route::get('/admin', [AdminManagementController::class, 'index'])->name('admin.admin');
    Route::post('/update-admin', [AdminManagementController::class, 'updateAdmin'])->name('admin.update-admin');
    Route::post('/update-avatar', [AdminManagementController::class, 'updateAvatar'])->name('admin.update-avatar');

    //Management Booking
    Route::get('/booking', [BookingManagementController::class, 'index'])->name('admin.booking');
    Route::post('/confirm-booking', [BookingManagementController::class, 'confirmBooking'])->name('admin.confirm-booking');
    Route::get('/booking-detail/{id?}', [BookingManagementController::class, 'showDetail'])->name('admin.booking-detail');
    Route::post('/finish-booking', [BookingManagementController::class, 'finishBooking'])->name('admin.finish-booking');
    Route::post('/received-money', [BookingManagementController::class, 'receiviedMoney'])->name('admin.received');

    //Send mail pdf
    Route::post('/admin/send-pdf', [BookingManagementController::class, 'sendPdf'])->name('admin.send.pdf');

    //Contact management
    Route::get('/contact', [ContactManagementController::class, 'index'])->name('admin.contact');
    Route::post('/reply-contact', [ContactManagementController::class, 'replyContact'])->name('admin.reply-contact');

});

Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        return '✅ Database connection is successful!';
    } catch (\Exception $e) {
        return '❌ Connection failed: ' . $e->getMessage();
    }
});

//Airplane Booking
Route::get('/airplane', [AirplaneController::class, 'index'])->name('airplane');
Route::post('/airplane-booking', [AirplaneController::class, 'createBooking'])->name('airplane-booking');
Route::get('/airplane-booking', [AirplaneBookingController::class, 'showBookingForm'])->name('airplane-booking.form');
Route::get('/airplane-booking/success', function() 
{
    return view('clients.partials.Airplane_booking.airplane-booking-success');
})->name('airplane-booking.success');

Route::get('/airplane-flights', [AirplaneFlightController::class, 'index'])->name('airplane-flights');
Route::get('/airplane-seat-select', [AirplaneSeatController::class, 'index'])->name('airplane-seat-select');

Route::get('/airplane-payment', [AirplanePaymentController::class, 'index'])->name('airplane-payment');
Route::post('/airplane-payment/process', [AirplanePaymentController::class, 'process'])->name('airplane-payment.process');


//Transport Booking
Route::get('/transport', [TransportController::class, 'index'])->name('transport');
Route::get('/booking/transport', [TransportController::class, 'bookingForm'])->name('booking.transport');
