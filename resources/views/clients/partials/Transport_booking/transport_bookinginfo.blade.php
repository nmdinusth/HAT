<!-- Customer Information Step -->
<div class="booking-step step-2 d-none">
    <div class="row">
        <div class="col-md-8">
            <!-- Contact Information -->
            <div class="card p-4 mb-3">
                <h5 class="fw-bold mb-3">Thông tin liên hệ</h5>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Danh xưng <span class="text-danger">*</span></label>
                        <select id="contact-salutation" class="form-select">
                            <option>Chọn</option>
                            <option>Ông</option>
                            <option>Bà</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Tên liên hệ <span class="text-danger">*</span></label>
                        <input type="text" id="contact-name" class="form-control" placeholder="HỌ VÀ TÊN">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" id="contact-address" class="form-control" placeholder="Địa chỉ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select id="contact-phone-code" class="form-select flex-grow-0" style="width: 100px;">
                                <option>+84</option>
                                <option>+1</option>
                            </select>
                            <input type="text" id="contact-phone" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" id="contact-email" class="form-control" placeholder="E-mail">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ghi chú</label>
                    <textarea id="contact-notes" class="form-control" rows="3" placeholder="Ghi chú"></textarea>
                </div>
            </div>

            <!-- Billing Information -->
            <div class="card mb-3">
                <div class="card-header bg-white p-3" data-bs-toggle="collapse" href="#billingInfo" role="button" aria-expanded="true" aria-controls="billingInfo">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Thông tin xuất hóa đơn</h5>
                        <i class="fa fa-chevron-up"></i>
                    </div>
                </div>
                <div class="collapse show" id="billingInfo">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tên doanh nghiệp</label>
                                <input type="text" class="form-control" placeholder="Tên doanh nghiệp">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Mã số thuế</label>
                                <input type="text" class="form-control" placeholder="Mã số thuế">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <div class="input-group">
                                    <select class="form-select flex-grow-0" style="width: 100px;">
                                        <option>+84</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mã bưu điện</label>
                            <input type="text" class="form-control" placeholder="Mã bưu điện">
                        </div>
                        <div class="row">
                           <div class="col-md-8 mb-3">
                                <label class="form-label">Tên người nhận</label>
                                <input type="text" class="form-control" placeholder="HỌ VÀ TÊN">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <div class="input-group">
                                    <select class="form-select flex-grow-0" style="width: 100px;">
                                        <option>+84</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booker Information -->
            <div class="card mb-3">
                 <div class="card-header bg-white p-3" data-bs-toggle="collapse" href="#bookerInfo" role="button" aria-expanded="true" aria-controls="bookerInfo">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Thông tin người đặt</h5>
                        <i class="fa fa-chevron-up"></i>
                    </div>
                </div>
                <div class="collapse show" id="bookerInfo">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Người đặt <span class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option>Tên người - tên tài khoản</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"  style="width: 100px;">+00</span>
                                    <input type="text" class="form-control bg-light" value="00000000000" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control bg-light" value="email@email" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button id="btn-step2-next" class="btn btn-warning w-100">Tiếp theo</button>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <div class="mb-3">
                    <h6 class="fw-bold">Đưa khách đến sân bay</h6>
                    <div class="text-muted small">Sân bay <span class="text-danger">*</span></div>
                    <div class="p-2 bg-light rounded mt-1">Cảng hàng không Quốc tế Nội Bài</div>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold">Giờ đón khách tại điểm đón <span class="text-danger">*</span></h6>
                    <div class="p-2 bg-light rounded mt-1">15:30 15/11/2025</div>
                </div>
                 <div class="mb-3">
                    <h6 class="fw-bold">Điểm đón khách <span class="text-danger">*</span></h6>
                    <div class="p-2 bg-light rounded mt-1">
                        <div class="fw-bold">Highlands Nguyễn Hoàng</div>
                        <div class="text-muted small">Số 6, đường Nguyễn Hoàng, Phường Mỹ Đình 2, quận Nam Từ Liêm, Tp. Hà Nội</div>
                    </div>
                </div>
                <div class="border-top pt-3">
                    <h6 class="fw-bold">Xe đưa đón</h6>
                     <div class="py-2 d-flex justify-content-between align-items-center">
                        <span id="summary-trip-details"></span>
                        <span id="summary-trip-price" class="text-warning fw-bold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 