<x-mail::message>
# Xác nhận đặt vé máy bay thành công

Cảm ơn bạn đã đặt vé máy bay tại {{ config('app.name') }}!

**Thông tin đặt vé:**
- Họ tên: {{ $booking->gender }}
- Email: {{ $booking->email }}
- Số điện thoại: {{ $booking->phone }}
- Quốc tịch: {{ $booking->nationality }}
- Từ: {{ $booking->from }}
- Đến: {{ $booking->to }}
- Ngày đi: {{ $booking->depart }}
- Ngày về: {{ $booking->return ?? '---' }}
- Số hành khách: {{ $booking->passenger }}
- Loại giấy tờ: {{ $booking->id_type }}
- Số giấy tờ: {{ $booking->id_number }}
- Ngày hết hạn giấy tờ: {{ $booking->id_expiry }}

Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
