@extends('layouts.app')
@section('content')
<div class="container text-center py-5">
    <h2>404 - Không tìm thấy trang</h2>
    <p>Trang bạn yêu cầu không tồn tại hoặc đã bị xóa.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Về trang chủ</a>
</div>
@endsection 