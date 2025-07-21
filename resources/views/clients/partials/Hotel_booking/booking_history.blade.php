@extends('clients.layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Lịch sử đặt phòng khách sạn</h2>
    @if($bookings->isEmpty())
        <p>Bạn chưa có booking nào.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã booking</th>
                <th>Khách sạn</th>
                <th>Phòng</th>
                <th>Ngày nhận</th>
                <th>Ngày trả</th>
                <th>Khách</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->hotel_id }}</td>
                <td>{{ $booking->room_id }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->check_out_date }}</td>
                <td>{{ $booking->guests }}</td>
                <td>{{ number_format($booking->total_price) }} VNĐ</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <a href="{{ route('booking.detail', $booking->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                    @if($booking->status === 'pending')
                    <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn hủy booking này?')">Hủy</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection 