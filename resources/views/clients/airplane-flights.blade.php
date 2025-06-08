@include('clients.blocks.header_home')
@include('clients.blocks.banner')
@php
    $type = request('type', 'domestic');
@endphp
<div class="container py-5">
    <h2 class="mb-4 text-center">Danh Sách Chuyến Bay</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="GET" action="/airplane-flights">
                        <input type="hidden" name="type" value="{{ $type }}">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Từ</label>
                            <select class="form-select" name="from" required style="max-height:200px;overflow-y:auto;">
                                <option value="">Chọn điểm đi</option>
                                <option value="hanoi" {{ $from == 'hanoi' ? 'selected' : '' }}>Hà Nội</option>
                                <option value="danang" {{ $from == 'danang' ? 'selected' : '' }}>Đà Nẵng</option>
                                <option value="hochiminh" {{ $from == 'hochiminh' ? 'selected' : '' }}>Hồ Chí Minh City</option>
                                <option value="nhatrang" {{ $from == 'nhatrang' ? 'selected' : '' }}>Nha Trang</option>
                                <option value="phuquoc" {{ $from == 'phuquoc' ? 'selected' : '' }}>Phú Quốc</option>
                                @if($type === 'international')
                                    <option value="newyork" {{ $from == 'newyork' ? 'selected' : '' }}>New York</option>
                                    <option value="tokyo" {{ $from == 'tokyo' ? 'selected' : '' }}>Tokyo</option>
                                    <option value="paris" {{ $from == 'paris' ? 'selected' : '' }}>Paris</option>
                                    <option value="london" {{ $from == 'london' ? 'selected' : '' }}>London</option>
                                    <option value="singapore" {{ $from == 'singapore' ? 'selected' : '' }}>Singapore</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Đến</label>
                            <select class="form-select" name="to" required style="max-height:200px;overflow-y:auto;">
                                <option value="">Chọn điểm đến</option>
                                <option value="hanoi" {{ $to == 'hanoi' ? 'selected' : '' }}>Hà Nội</option>
                                <option value="danang" {{ $to == 'danang' ? 'selected' : '' }}>Đà Nẵng</option>
                                <option value="hochiminh" {{ $to == 'hochiminh' ? 'selected' : '' }}>Hồ Chí Minh City</option>
                                <option value="nhatrang" {{ $to == 'nhatrang' ? 'selected' : '' }}>Nha Trang</option>
                                <option value="phuquoc" {{ $to == 'phuquoc' ? 'selected' : '' }}>Phú Quốc</option>
                                @if($type === 'international')
                                    <option value="newyork" {{ $to == 'newyork' ? 'selected' : '' }}>New York</option>
                                    <option value="tokyo" {{ $to == 'tokyo' ? 'selected' : '' }}>Tokyo</option>
                                    <option value="paris" {{ $to == 'paris' ? 'selected' : '' }}>Paris</option>
                                    <option value="london" {{ $to == 'london' ? 'selected' : '' }}>London</option>
                                    <option value="singapore" {{ $to == 'singapore' ? 'selected' : '' }}>Singapore</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ngày đi</label>
                            <input type="date" class="form-control" name="depart" value="{{ $depart }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ngày về</label>
                            <input type="date" class="form-control" name="return" value="{{ $return }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Số hành khách</label>
                            <input type="number" class="form-control" name="passenger" min="1" value="{{ $passenger ?? 1 }}" required>
                        </div>
                        <button type="submit" class="btn btn-info w-100">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="mb-3">
                <strong>Từ:</strong> {{ $from }} &nbsp; <strong>Đến:</strong> {{ $to }} &nbsp; <strong>Ngày đi:</strong> {{ $depart }}
                @if($return)
                    &nbsp; <strong>Ngày về:</strong> {{ $return }}
                @endif
                &nbsp; <strong>Số hành khách:</strong> {{ $passenger }}
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @foreach($flights as $flight)
                        <div class="card mb-3">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <strong>{{ $flight['airline'] }}</strong><br>
                                    {{ $flight['from'] }} → {{ $flight['to'] }}<br>
                                    Giờ đi: {{ $flight['depart_time'] }} - Giờ đến: {{ $flight['arrive_time'] }}<br>
                                    Mã chuyến: {{ $flight['flight_code'] }}<br>
                                    Giá: {{ number_format($flight['price'], 0, ',', '.') }} VNĐ
                                </div>
                                <div>
                                    <form method="GET" action="/airplane-seat-select">
                                        <input type="hidden" name="from" value="{{ $flight['from'] }}">
                                        <input type="hidden" name="to" value="{{ $flight['to'] }}">
                                        <input type="hidden" name="depart" value="{{ $flight['date'] }}">
                                        <input type="hidden" name="flight_code" value="{{ $flight['flight_code'] }}">
                                        <input type="hidden" name="passenger" value="{{ $passenger }}">
                                        <input type="hidden" name="type" value="{{ $type }}">
                                        <button type="submit" class="btn btn-primary">Đặt ngay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('clients.blocks.footer')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<style>
select.form-select {
  appearance: none !important;
  -webkit-appearance: none !important;
  -moz-appearance: none !important;
  background: transparent !important;
  border: none !important;
  box-shadow: none !important;
}
select.form-select::-ms-expand {
  display: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fromSelect = document.getElementById('fromPlace');
    const toSelect = document.getElementById('toPlace');
    if (fromSelect) new Choices(fromSelect, { searchEnabled: false, shouldSort: false });
    if (toSelect) new Choices(toSelect, { searchEnabled: false, shouldSort: false });
    if (window.Choices) {
        new Choices('#fromPlace', { searchEnabled: false, shouldSort: false });
        new Choices('#toPlace', { searchEnabled: false, shouldSort: false });
    }
});
</script> 