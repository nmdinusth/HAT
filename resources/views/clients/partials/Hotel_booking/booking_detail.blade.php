@extends('clients.layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Chi tiết booking khách sạn</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Mã booking:</strong> {{ $booking->id }}</p>
            <p><strong>Khách sạn:</strong> {{ $booking->hotel_id }}</p>
            <p><strong>Phòng:</strong> {{ $booking->room_id }}</p>
            <p><strong>Ngày nhận phòng:</strong> {{ $booking->check_in_date }}</p>
            <p><strong>Ngày trả phòng:</strong> {{ $booking->check_out_date }}</p>
            <p><strong>Số khách:</strong> {{ $booking->guests }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($booking->total_price) }} VNĐ</p>
            <p><strong>Trạng thái:</strong> {{ $booking->status }}</p>
            <a href="{{ route('booking.history') }}" class="btn btn-secondary">Quay lại lịch sử</a>
        </div>
    </div>
</div>
@endsection 