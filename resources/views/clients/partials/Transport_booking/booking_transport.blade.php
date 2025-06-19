@include('clients.blocks.header_home')

<div class="header-spacer"></div>

<div class="container py-5">
    <!-- Stepper -->
    <div class="mb-4">
        <div class="d-flex justify-content-center align-items-center">
            <div class="step active">01<br><span>Booking</span></div>
            <div class="step-line"></div>
            <div class="step">02<br><span>Customer Information</span></div>
            <div class="step-line"></div>
            <div class="step">03<br><span>Confirmation Booking</span></div>
        </div>
    </div>

    <!-- Booking Form Steps -->
    <div class="booking-step step-1">
        <div class="row">
            <div class="col-md-8">
                <div class="card p-4 mb-3">
                    <div class="d-flex mb-3">
                        <button class="btn btn-toggle active-tab me-2" data-target="airport">Đưa đón sân bay</button>
                        <button class="btn btn-toggle" data-target="fixedpoint">Đưa đón điểm cố định</button>
                    </div>

                    <!-- Đưa đón sân bay -->
                    <div class="trip-group-section" id="airport-section">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input trip-option-toggle" type="radio" name="airport_trip_option" id="airport-dropoff" value="dropoff" checked>
                            <label class="form-check-label fw-bold" for="airport-dropoff">Đưa khách đến sân bay</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input trip-option-toggle" type="radio" name="airport_trip_option" id="airport-pickup" value="pickup">
                            <label class="form-check-label fw-bold" for="airport-pickup">Trả khách từ sân bay</label>
                        </div>

                        <!-- Đưa khách đến sân bay -->
                        <div class="trip-section mt-3" id="airport-dropoff-section">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Sân bay <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Chọn sân bay">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giờ đón khách tại điểm đón <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="HHMM | D/MM/YYYY">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Điểm đón khách</label>
                                <input type="text" class="form-control mb-2" placeholder="Tìm địa điểm">
                                <div class="p-2 bg-white border rounded mb-2">
                                    <div class="fw-bold">Highlands Nguyễn Hoàng</div>
                                    <div class="small">Số 6, đường Nguyễn Hoàng, Nam Từ Liêm, Hà Nội</div>
                                    <button class="btn btn-sm btn-link text-danger">Xóa</button>
                                </div>
                                <button class="btn btn-outline-secondary btn-sm">+ Thêm điểm đón</button>
                            </div>
                        </div>

                        <!-- Trả khách từ sân bay -->
                        <div class="trip-section mt-3 d-none" id="airport-pickup-section">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Giờ đón khách tại sân bay <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="HHMM | D/MM/YYYY">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Điểm trả khách</label>
                                <input type="text" class="form-control mb-2" placeholder="Tìm địa điểm">
                                <div class="p-2 bg-white border rounded mb-2">
                                    <div class="fw-bold">Highlands Nguyễn Hoàng</div>
                                    <div class="small">Số 6, đường Nguyễn Hoàng, Nam Từ Liêm, Hà Nội</div>
                                    <button class="btn btn-sm btn-link text-danger">Xóa</button>
                                </div>
                                <button class="btn btn-outline-secondary btn-sm">+ Thêm điểm trả khách</button>
                            </div>
                        </div>
                    </div>

                    <!-- Đưa đón điểm cố định -->
                    <div class="trip-group-section d-none" id="fixedpoint-section">
                        <div class="p-3 bg-light rounded">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Giờ đón khách <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="HHMM | D/MM/YYYY">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Điểm xuất phát <span class="text-danger">*</span></label>
                                <div class="p-2 bg-white border rounded">
                                    <div class="fw-bold">Highlands Nguyễn Hoàng</div>
                                    <div class="small">Số 6, đường Nguyễn Hoàng, phường Mỹ Đình 2, quận Nam Từ Liêm, Tp. Hà Nội</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hasStopPoint">
                                    <label class="form-check-label fw-bold" for="hasStopPoint">Điểm quá giang</label>
                                </div>
                                <input type="text" class="form-control mb-2" placeholder="Tìm địa điểm">
                                <button class="btn btn-outline-secondary btn-sm">+ Thêm điểm quá giang</button>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Điểm kết thúc <span class="text-danger">*</span></label>
                                <div class="p-2 bg-white border rounded">
                                    <div class="fw-bold">Highlands Nguyễn Hoàng</div>
                                    <div class="small">Số 6, đường Nguyễn Hoàng, Nam Từ Liêm, Tp. Hà Nội</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Tất cả</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Sử dụng mã khuyến mại</label>
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Loại xe <span class="text-danger">*</span></label>
                        <select class="form-select">
                            <option value="">Sedan (Standard)</option>
                            <option value="">SUV</option>
                            <option value="">Minivan</option>
                        </select>
                        <div class="mt-2">
                            <span class="me-3"><i class="fas fa-user-friends"></i> 3</span>
                            <span><i class="fas fa-suitcase"></i> 3</span>
                        </div>
                    </div>

                    <button class="btn btn-warning w-100">Tìm chuyến xe</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <div class="fw-bold mb-2">Kết quả tìm kiếm</div>
                    <div class="border-bottom py-2 d-flex justify-content-between align-items-center">
                        <span><span class="badge bg-warning text-dark">Logo hãng</span> Xanh Plus</span>
                        <span class="text-warning fw-bold">300.000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.step {
    font-size: 14px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #fff3cd;
    color: #ff9900;
    font-weight: bold;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px solid #ff9900;
    text-align: center;
    line-height: 1.1;
}
.step span {
    font-size: 12px;
    font-weight: normal;
    display: block;
    margin-top: 2px;
    line-height: 1.2;
    text-align: center;
    word-break: break-word;
}
.step.active {
    background: #ff9900;
    color: #fff;
}
.step-line {
    width: 60px;
    height: 4px;
    background: #ff9900;
    margin: 0 10px;
    border-radius: 2px;
}
.booking-step .card {
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.btn-toggle {
    background-color: #fff;
    border: 2px solid #ffc107;
    color: #000;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
}
.btn-toggle.active-tab {
    background-color: #ffc107;
    color: #000;
}
</style>

<script>
document.querySelectorAll('.btn-toggle').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.btn-toggle').forEach(b => b.classList.remove('active-tab'));
        this.classList.add('active-tab');

        const target = this.dataset.target;
        document.querySelectorAll('.trip-group-section').forEach(section => section.classList.add('d-none'));
        document.getElementById(`${target}-section`).classList.remove('d-none');
    });
});

document.querySelectorAll('.trip-option-toggle').forEach(radio => {
    radio.addEventListener('change', function() {
        const value = this.value;
        document.querySelectorAll('#airport-section .trip-section').forEach(section => section.classList.add('d-none'));
        document.getElementById(`airport-${value}-section`).classList.remove('d-none');
    });
});
</script>

@include('clients.blocks.footer')