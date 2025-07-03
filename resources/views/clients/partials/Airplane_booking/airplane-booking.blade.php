@include('clients.blocks.header_hotel')
@include('clients.blocks.banner_hotel')

<section class="airplane-booking-area py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center d-flex justify-content-center gap-4 align-items-center" style="font-size:1.1rem;">
                <label class="radio-custom me-4">
                    <input type="radio" name="tripType" id="roundTrip" value="round" checked>
                    <span class="custom-circle"></span>
                    <span class="label-text">Khứ hồi</span>
                </label>
                <label class="radio-custom">
                    <input type="radio" name="tripType" id="oneWay" value="oneway">
                    <span class="custom-circle"></span>
                    <span class="label-text">Một chiều</span>
                </label>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-4">
                    <h1 class="fw-bold mb-2" style="font-size:2.5rem;">Đặt Vé Máy Bay</h1>
                    <div class="text-muted mb-3" style="font-size:1.1rem;">Điền thông tin để tìm chuyến bay phù hợp</div>
                </div>
                <form id="airplaneBookingForm" method="POST" action="{{ route('airplane-booking') }}">
                    @csrf   
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fromPlace" class="form-label fw-bold">Từ</label>
                                <select id="fromPlace" name="from" required class="form-select py-2 rounded-pill">
                                    <option value="" selected disabled hidden>Chọn điểm đi</option>
                                    <option value="hanoi">Hà Nội</option>
                                    <option value="danang">Đà Nẵng</option>
                                    <option value="hochiminh">Hồ Chí Minh City</option>
                                    <option value="nhatrang">Nha Trang</option>
                                    <option value="phuquoc">Phú Quốc</option>
                                    @if($type === 'international')
                                    <option value="newyork">New York</option>
                                    <option value="tokyo">Tokyo</option>
                                    <option value="paris">Paris</option>
                                    <option value="london">London</option>
                                    <option value="singapore">Singapore</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="toPlace" class="form-label fw-bold">Đến</label>
                                <select id="toPlace" name="to" required class="form-select py-2 rounded-pill">
                                    <option value="" selected disabled hidden>Chọn điểm đến</option>
                                    <option value="hanoi">Hà Nội</option>
                                    <option value="danang">Đà Nẵng</option>
                                    <option value="hochiminh">Hồ Chí Minh City</option>
                                    <option value="nhatrang">Nha Trang</option>
                                    <option value="phuquoc">Phú Quốc</option>
                                    @if($type === 'international')
                                    <option value="newyork">New York</option>
                                    <option value="tokyo">Tokyo</option>
                                    <option value="paris">Paris</option>
                                    <option value="london">London</option>
                                    <option value="singapore">Singapore</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departDate" class="form-label fw-bold">Ngày đi</label>
                                <input type="date" class="form-control py-2 rounded-pill" id="departDate" name="depart" required>
                            </div>
                        </div>
                        <div class="col-md-6" id="returnDateGroup">
                            <div class="form-group">
                                <label for="returnDate" class="form-label fw-bold">Ngày về</label>
                                <input type="date" class="form-control py-2 rounded-pill" id="returnDate" name="return">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passenger" class="form-label fw-bold">Số hành khách</label>
                                <input type="number" class="form-control py-2 rounded-pill" id="passenger" name="passenger" min="1" value="1" required>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-success w-100 py-2 rounded-pill fw-bold" style="font-size:1.2rem;">
                                Tìm Chuyến Bay <span class="ms-2"><i class="fal fa-arrow-right"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('clients.blocks.footer_hotel')

<style>
body, .fw-bold, h1, h3, label, button, input, select {
    font-family: 'Montserrat', Arial, sans-serif;
}
.radio-custom {
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    user-select: none;
    display: inline-flex;
    align-items: center;
}
.radio-custom input[type="radio"] {
    opacity: 0;
    position: absolute;
    left: 0;
    top: 0;
}
.custom-circle {
    position: absolute;
    left: 0;
    top: 2px;
    height: 18px;
    width: 18px;
    background: #fff;
    border: 2px solid #28a745;
    border-radius: 50%;
}
.radio-custom input[type="radio"]:checked ~ .custom-circle {
    background: #28a745;
    border-color: #28a745;
}
.radio-custom input[type="radio"]:checked ~ .custom-circle:after {
    content: '';
    display: block;
    margin: 4px auto;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #fff;
}
.label-text {
    margin-left: 8px;
    font-weight: 500;
}
</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<script>
// Ẩn ngày về nếu chọn một chiều
const roundTrip = document.getElementById('roundTrip');
const oneWay = document.getElementById('oneWay');
const returnDateGroup = document.getElementById('returnDateGroup');
roundTrip.addEventListener('change', function() {
    if(this.checked) returnDateGroup.style.display = '';
});
oneWay.addEventListener('change', function() {
    if(this.checked) returnDateGroup.style.display = 'none';
});
// Kiểm tra không cho chọn cùng điểm đi và điểm đến
document.getElementById('airplaneBookingForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission
    
    const from = document.getElementById('fromPlace').value;
    const to = document.getElementById('toPlace').value;
    
    if (from === to) {
        alert("Điểm đi và điểm đến không được giống nhau!");
        return;
    }

    // Get form data
    const formData = new FormData(this);
    
    // Redirect to airplane-flights with query parameters
    const queryParams = new URLSearchParams(formData).toString();
    window.location.href = `/airplane-flights?${queryParams}`;
});
// Ẩn ngày về mặc định nếu chọn một chiều
if(oneWay.checked) returnDateGroup.style.display = 'none';
</script>
