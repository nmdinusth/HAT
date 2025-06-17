@include('clients.blocks.header_home')

<div class="container py-5">
    <!-- Stepper -->
    <div class="mb-4">
        <div class="d-flex justify-content-center align-items-center">
            <div class="step active">01<br><span>Chọn xe đưa đón</span></div>
            <div class="step-line"></div>
            <div class="step">02<br><span>Thông tin khách hàng</span></div>
            <div class="step-line"></div>
            <div class="step">03<br><span>Xác nhận đặt xe</span></div>
        </div>
    </div>
    <!-- Booking Form Steps (chỉ giao diện, chưa xử lý js) -->
    <div class="booking-step step-1">
        <div class="row">
            <div class="col-md-8">
                <div class="card p-4 mb-3">
                    <div class="d-flex mb-3">
                        <button class="btn btn-warning me-2 active">Đưa đón sân bay</button>
                        <button class="btn btn-outline-warning">Đưa đón điểm cố định</button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Sân bay <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Chọn sân bay">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Giờ đón khách tại điểm đón <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="HH:MM | DD/MM/YYYY">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Điểm đón khách <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2" placeholder="Nhập địa điểm">
                        <button class="btn btn-outline-secondary btn-sm">+ Thêm điểm đón</button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Hãng xe | Mã khuyến mại</label>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" class="form-check-input me-2" checked> Tất cả
                            <input type="checkbox" class="form-check-input ms-4 me-2"> Sử dụng mã khuyến mại
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Loại xe <span class="text-danger">*</span></label>
                        <select class="form-select">
                            <option>Sedan (Standard)</option>
                            <option>SUV</option>
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
                        <span><span class="badge bg-warning text-dark">Logo hãng</span> GrabCar Plus</span>
                        <span class="text-warning fw-bold">350.000</span>
                    </div>
                    <div class="border-bottom py-2 d-flex justify-content-between align-items-center">
                        <span><span class="badge bg-warning text-dark">Logo hãng</span> Xanh Plus</span>
                        <span class="text-warning fw-bold">300.000</span>
                    </div>
                    <div class="py-2 d-flex justify-content-between align-items-center">
                        <span><span class="badge bg-warning text-dark">Logo hãng</span> Taxi SB</span>
                        <span class="text-warning fw-bold">300K-380K</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Các bước tiếp theo sẽ bổ sung sau -->
</div>

<style>
.step { width: 60px; height: 60px; border-radius: 50%; background: #fff3cd; color: #ff9900; font-weight: bold; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px solid #ff9900; }
.step.active { background: #ff9900; color: #fff; }
.step-line { width: 60px; height: 4px; background: #ff9900; margin: 0 10px; border-radius: 2px; }
.booking-step .card { box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
</style>

@include('clients.blocks.footer') 