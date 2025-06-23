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
                        <select id="contact-salutation" name="contact_salutation" required
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
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
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                        <input type="text" id="contact-phone" class="form-control" placeholder="Số điện thoại">
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
                                <select name="contact_type" required
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
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

            <button id="btn-step2-next" class="btn btn-warning w-100">Cập nhật</button>
        </div>

        <div class="col-md-4">
            @include('clients.partials.Transport_booking.transport_booking_summary')
        </div>
    </div>
</div> 