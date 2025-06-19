@extends('layouts.app')
@section('content')
<div class="container text-center py-5">
    <h2>Đặt vé thành công!</h2>
    <p>Cảm ơn bạn đã đặt vé máy bay tại {{ config('app.name') }}.</p>
    <a href="/" class="btn btn-success mt-3">Về trang chủ</a>
</div>
@endsection 