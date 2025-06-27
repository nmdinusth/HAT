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
                <!-- Checkbox để hiện thông tin đặt hộ -->
                <div class="custom-checkbox-group mb-2">
                    <input type="checkbox" id="toggle-booker-info" class="custom-checkbox" hidden>
                    <label for="toggle-booker-info" class="custom-checkbox-label"
                        <span class="custom-checkbox-box"></span> Tôi muốn nhập thông tin đặt hộ
                    </label>
                </div>
            </div>

            <!-- Booker Information (ẩn mặc định) -->
            <div class="card mb-3 d-none" id="booker-info-card">
                <div class="card-header bg-white p-3">
                    <h5 class="fw-bold mb-0">Thông tin Đặt hộ</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Tên người nhận đặt hộ <span class="text-danger">*</span></label>
                            <input type="text" name="booker_name" class="form-control" placeholder="Tên người nhận đặt hộ" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" name="booker_phone" class="form-control" placeholder="Số điện thoại" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="booker_email" class="form-control" placeholder="E-mail">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkbox = document.getElementById('toggle-booker-info');
        var bookerCard = document.getElementById('booker-info-card');
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                bookerCard.classList.remove('d-none');
            } else {
                bookerCard.classList.add('d-none');
            }
        });
    });
</script>

<style>
.form-check-input[type="checkbox"] {
    width: 16px !important;
    height: 16px !important;
    border-radius: 50% !important;
    background-size: 10px 10px !important;
}
.form-check-label {
    font-size: 15px;
    margin-left: 2px;
    vertical-align: middle;
}
.form-check {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    padding-left: 0 !important;
}
.custom-checkbox-group {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}
.custom-checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 15px;
    margin-left: 0;
    user-select: none;
}
.custom-checkbox-box {
    width: 20px;
    height: 20px;
    border: 2px solid #ff9900;
    border-radius: 50%;
    background: #fff;
    margin-right: 8px;
    display: inline-block;
    position: relative;
    transition: border-color 0.2s, background 0.2s;
}
.custom-checkbox:checked + .custom-checkbox-label .custom-checkbox-box {
    background: #ff9900;
    border-color: #ff9900;
}
.custom-checkbox:checked + .custom-checkbox-label .custom-checkbox-box::after {
    content: '';
    display: block;
    width: 10px;
    height: 10px;
    background: #fff;
    border-radius: 50%;
    position: absolute;
    top: 4px;
    left: 4px;
}
.card input.form-control:not([type="checkbox"]):not([type="radio"]),
.card select,
.card textarea.form-control {
    border: 2px solid #222 !important;
    border-radius: 6px !important;
    box-shadow: none !important;
    background: #fff !important;
}
.card input.form-control:not([type="checkbox"]):not([type="radio"]):focus,
.card select:focus,
.card textarea.form-control:focus {
    border: 2px solid #222 !important;
    box-shadow: none !important;
}
</style> 