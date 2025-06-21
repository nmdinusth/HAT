<!-- Confirmation Step -->
<div class="booking-step step-3 d-none">
    <div class="row">
        <div class="col-md-8">
            <div class="card p-4 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">Thông tin đặt xe</h5>
                        <p class="mb-1 text-muted" id="confirm-trip-type">Đưa khách đến sân bay</p>
                        <p class="mb-1"><span class="fw-bold">Điểm đón khách:</span></p>
                        <p class="text-muted ms-3" id="confirm-pickup-address">#1 Highlands Nguyễn Hoàng<br>Số 6, đường Nguyễn Hoàng, phường Mỹ Đình 2, quận Nam Từ Liêm, Tp. Hà Nội</p>
                        <p class="mb-1"><span class="fw-bold">Loại xe:</span></p>
                        <div id="confirm-car-type" class="d-flex align-items-center ms-3">
                            <!-- Populated by JS -->
                        </div>
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
            
            <div class="mt-3 d-flex justify-content-end">
                <button class="btn btn-light border me-2">Đặt thêm sản phẩm khác</button>
                <button class="btn btn-warning">Xác nhận Đặt xe</button>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <div class="mb-3">
                    <h6 class="fw-bold" id="summary-title-step3">Đưa khách đến sân bay</h6>
                    <div class="text-muted small">Sân bay <span class="text-danger">*</span></div>
                    <div class="p-2 bg-light rounded mt-1">Cảng hàng không Quốc tế Nội Bài</div>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Giờ đón khách tại điểm đón <span class="text-danger">*</span></h6>
                    <div class="p-2 bg-light rounded mt-1" id="summary-pickup-time-step3"></div>
                </div>
                 <div class="mb-3">
                    <h6 class="fw-bold">Điểm đón khách <span class="text-danger">*</span></h6>
                    <div class="p-2 bg-light rounded mt-1">
                        <div class="fw-bold" id="summary-pickup-point-step3">Highlands Nguyễn Hoàng</div>
                        <div class="text-muted small" id="summary-pickup-address-step3">Số 6, đường Nguyễn Hoàng, Phường Mỹ Đình 2, quận Nam Từ Liêm, Tp. Hà Nội</div>
                    </div>
                </div>
                <div class="border-top pt-3">
                    <h6 class="fw-bold">Xe đưa đón</h6>
                     <div class="py-2 d-flex justify-content-between align-items-center">
                        <span id="summary-trip-details-step3"></span>
                        <span id="summary-trip-price-step3" class="text-warning fw-bold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 