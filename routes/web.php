<?php

use App\Http\Controllers\Auth\GoogleAuthController;
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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
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


Route::get('auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);

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
//Hanlde confirm & payment
Route::get('/confirm-payment', [HotelController::class, 'confirmPayment'])->name('confirm-payment');

// Các view khác nếu cần thiết
Route::get('/room-search-result', [HotelController::class, 'roomSearchResult']);
Route::get('/room-search-result-list', [HotelController::class, 'roomSearchResultList']);



//Handle user profile
Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user-profile')->middleware(['checkLoginClient', 'checkUserRole']);
Route::post('/user-profile', [UserProfileController::class, 'update'])->name('update-user-profile')->middleware(['checkLoginClient', 'checkUserRole']);
Route::post('/change-password-profile', [UserProfileController::class, 'changePassword'])->name('change-password')->middleware(['checkLoginClient', 'checkUserRole']);
Route::post('/change-avatar-profile', [UserProfileController::class, 'changeAvatar'])->name('change-avatar')->middleware(['checkLoginClient', 'checkUserRole']);


//Hanlde checkout
Route::post('/booking/{id?}', [BookingController::class, 'index'])->name('booking')->middleware(['checkLoginClient', 'checkUserRole']);
Route::post('/create-booking', [BookingController::class, 'createBooking'])->name('create-booking')->middleware(['checkLoginClient', 'checkUserRole']);
Route::get('/booking', [BookingController::class, 'handlePaymentMomoCallback'])->name('handlePaymentMomoCallback');

//Payment with paypal
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

//Payment with Momo
Route::post('/create-momo-payment', [BookingController::class, 'createMomoPayment'])->name('createMomoPayment')->middleware(['checkLoginClient', 'checkUserRole']);


//Search


//Airplane Booking
Route::get('/airplane', [AirplaneController::class, 'index'])->name('airplane');
Route::post('/airplane-booking', [AirplaneController::class, 'createBooking'])->name('airplane-booking')->middleware(['checkLoginClient', 'checkUserRole']);
Route::get('/airplane-booking', [AirplaneBookingController::class, 'showBookingForm'])->name('airplane-booking.form');
Route::get('/airplane-booking/success', function() 
{
    return view('clients.partials.Airplane_booking.airplane-booking-success');
})->name('airplane-booking.success');

Route::get('/airplane-flights', [AirplaneFlightController::class, 'index'])->name('airplane-flights');
Route::get('/airplane-seat-select', [AirplaneSeatController::class, 'index'])->name('airplane-seat-select');

Route::get('/airplane-payment', [AirplanePaymentController::class, 'index'])->name('airplane-payment');
Route::post('/airplane-payment/process', [AirplanePaymentController::class, 'process'])->name('airplane-payment.process')->middleware(['checkLoginClient', 'checkUserRole']);


//Transport Booking
Route::get('/transport', [TransportController::class, 'index'])->name('transport');
Route::get('/booking/transport', [TransportController::class, 'bookingForm'])->name('booking.transport');
Route::post('/booking/transport', [\App\Http\Controllers\Client\Transport\TransportController::class, 'storeBooking'])->name('booking.transport.store');
Route::get('/payment', [\App\Http\Controllers\Client\PaymentController::class, 'show'])->name('payment');
