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
                <!-- Đặt hộ cho người khác -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is-booking-for-others">
                    <label class="form-check-label" for="is-booking-for-others">Đặt hộ cho người khác</label>
                </div>
                <div id="booking-for-others-form" class="p-3 bg-light rounded-3 mb-2" style="display:none;">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tên người được đặt hộ <span class="text-danger">*</span></label>
                            <input type="text" id="other-name" class="form-control" placeholder="HỌ VÀ TÊN">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" id="other-phone" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Booker Information (ẩn nếu đặt hộ) -->
            <!-- Đã xóa card 'Thông tin người đặt' ở đây -->
            <button id="btn-step2-next" class="btn btn-warning w-100">Cập nhật</button>
        </div>
        <div class="col-md-4">
            @include('clients.partials.Transport_booking.transport_booking_summary')
        </div>
    </div>
</div>
<script>
document.getElementById('is-booking-for-others').addEventListener('change', function() {
    var form = document.getElementById('booking-for-others-form');
    var bookerCard = document.getElementById('booker-info-card');
    if(this.checked) {
        form.style.display = '';
        bookerCard.style.display = 'none';
    } else {
        form.style.display = 'none';
        bookerCard.style.display = '';
    }
});
// Validate khi ấn Cập nhật
const btnStep2Next = document.getElementById('btn-step2-next');
btnStep2Next.addEventListener('click', function(e) {
    if(document.getElementById('is-booking-for-others').checked) {
        const otherName = document.getElementById('other-name').value.trim();
        const otherPhone = document.getElementById('other-phone').value.trim();
        if(!otherName || !otherPhone) {
            alert('Vui lòng nhập đầy đủ thông tin người được đặt hộ!');
            e.preventDefault();
            return false;
        }
    }
});
</script> 