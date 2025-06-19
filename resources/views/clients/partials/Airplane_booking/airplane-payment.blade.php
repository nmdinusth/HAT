@include('clients.blocks.header_home')
@include('clients.blocks.banner')

<div class="container py-5">
    <h2 class="mb-4 text-center">Thanh Toán Vé Máy Bay</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Thông tin chuyến bay</h5>
                    <p><strong>Mã chuyến:</strong> {{ $flight_code }}</p>
                    <p><strong>Từ:</strong> {{ $from }}</p>
                    <p><strong>Đến:</strong> {{ $to }}</p>
                    <p><strong>Ngày đi:</strong> {{ $depart }}</p>
                    @if($return)
                        <p><strong>Ngày về:</strong> {{ $return }}</p>
                    @endif
                    <p><strong>Số hành khách:</strong> {{ $passenger }}</p>
                    <p><strong>Ghế đã chọn:</strong> {{ $seats }}</p>
                    <p><strong>Tổng tiền:</strong> {{ number_format($total_price, 0, ',', '.') }} VNĐ</p>
                </div>
            </div>

            <form id="paymentForm" method="POST" action="{{ route('airplane-payment.process') }}">
                @csrf
                <input type="hidden" name="from" value="{{ $from }}">
                <input type="hidden" name="to" value="{{ $to }}">
                <input type="hidden" name="depart" value="{{ $depart }}">
                <input type="hidden" name="return" value="{{ $return }}">
                <input type="hidden" name="passenger" value="{{ $passenger }}">
                <input type="hidden" name="flight_code" value="{{ $flight_code }}">
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="seats" value="{{ $seats }}">
                <input type="hidden" name="total_price" value="{{ $total_price }}">

                <div class="mb-4">
                    <h5>Thông tin hành khách</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="fullname" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Phương thức thanh toán</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="vnpay" value="vnpay" required>
                        <label class="form-check-label" for="vnpay">
                            <img src="{{ asset('clients/assets/images/booking/vnpay.jpg') }}" alt="VNPay" style="height: 50px;">
                            VNPay
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="momo" value="momo">
                        <label class="form-check-label" for="momo">
                            <img src="{{ asset('clients/assets/images/booking/momopay.jpg') }}" alt="Momo" style="height: 50px;">
                            Momo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                        <label class="form-check-label" for="paypal">
                            <img src="{{ asset('clients/assets/images/booking/paypalpay.jpg') }}" alt="PayPal" style="height: 60px;">
                            PayPal
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('airplane-seat-select') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('clients.blocks.footer') 