<!-- Confirmation Step -->
<div class="booking-step step-3 d-none">
    <div class="row">
        <div class="col-md-8">
            <div class="card p-4 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">Thông tin đặt xe</h5>
                        <p class="mb-1 text-muted" id="confirm-trip-type"></p>
                        <p class="mb-1"><span class="fw-bold">Điểm đón khách:</span></p>
                        <p class="text-muted ms-3" id="confirm-pickup-address"></p>
                        <p class="mb-1"><span class="fw-bold">Loại xe:</span></p>
                        <div id="confirm-car-type" class="d-flex align-items-center ms-3"></div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">Thông tin liên hệ</h5>
                        <p class="mb-1"><span class="fw-bold">Tên liên hệ:</span> <span id="confirm-contact-name"></span></p>
                        <p class="mb-1"><span class="fw-bold">Số điện thoại:</span> <span id="confirm-contact-phone"></span></p>
                        <p class="mb-1"><span class="fw-bold">E-mail:</span> <span id="confirm-contact-email"></span></p>
                        <p class="mb-1"><span class="fw-bold">Địa chỉ:</span> <span id="confirm-contact-address"></span></p>
                        <p class="mb-1"><span class="fw-bold">Ghi chú:</span> <span id="confirm-contact-notes"></span></p>
                    </div>
                </div>

                <div class="mt-3">
                     <label class="form-label fw-bold">Ghi chú</label>
                     <textarea id="confirm-notes-details" class="form-control" rows="3" placeholder="Ghi chú thêm..."></textarea>
                </div>
            </div>

            <div class="card p-3 d-flex flex-row justify-content-between align-items-center mb-3">
                 <div>
                    <h5 class="fw-bold mb-0">Tổng tiền (*)</h5>
                    <small class="text-muted">(*) Phí chờ phát sinh (nếu có lưu ý này)</small>
                 </div>
                 <h4 class="fw-bold text-warning mb-0" id="confirm-total-price"></h4>
            </div>
            
            <form method="POST" action="{{ route('booking.transport.store') }}">
                @csrf
                <!-- Các input ẩn, sau này sẽ lấy từ JS hoặc backend -->
                <input type="hidden" name="car_type" value="7 seats">
                <input type="hidden" name="pickup_address" value="Đón">
                <input type="hidden" name="pickup_time" value="10/07/2025, 12:00">
                <input type="hidden" name="contact_name" value="Đức">
                <input type="hidden" name="contact_phone" value="232145">
                <input type="hidden" name="contact_email" value="nah@gmail.com">
                <input type="hidden" name="total_price" value="500000">
                <button class="btn btn-warning" type="submit">Xác nhận Đặt xe</button>
            </form>
        </div>

        <div class="col-md-4">
            @include('clients.partials.Transport_booking.transport_booking_summary')
        </div>
    </div>
</div> 