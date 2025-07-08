@include('clients.blocks.header_hotel')
@include('clients.blocks.banner_hotel')

<div class="header-spacer"></div>

<div class="container py-5">
    <!-- Stepper -->
    <div class="mb-4">
        <div class="d-flex justify-content-center align-items-center">
            <div class="step active" data-step="1">01<br><span>Booking</span></div>
            <div class="step-line"></div>
            <div class="step" data-step="2">02<br><span>Customer Information</span></div>
            <div class="step-line"></div>
            <div class="step" data-step="3">03<br><span>Confirmation Booking</span></div>
        </div>
    </div>

    <!-- Booking Form Steps -->
    <div class="booking-step step-1">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card p-5 mb-4 shadow-lg border-0" style="border-radius:1.5rem;">
                    <div class="d-flex mb-4 gap-3 justify-content-center">
                        <button class="btn btn-toggle active-tab px-4 py-2 fw-bold rounded-pill me-2" data-target="airport" style="font-size:1.1rem;">Đưa đón sân bay</button>
                        <button class="btn btn-toggle px-4 py-2 fw-bold rounded-pill" data-target="fixedpoint" style="font-size:1.1rem;">Đưa đón điểm cố định</button>
                    </div>

                    <!-- Đưa đón sân bay -->
                    <div class="trip-group-section" id="airport-section">
                        <div class="mb-3 row justify-content-center" id="airport-select-row">
                            <div class="col-md-12">
                                <label for="airport-select" class="form-label fw-bold">Sân bay <span class="text-danger">*</span></label>
                                <select id="form-for-select" name="airport" required class="form-select py-3 rounded-pill">
                                    <option value="">Chọn sân bay</option>
                                    <option value="noibai">Sân bay Nội Bài</option>
                                    <option value="tansonnhat">Sân bay Tân Sơn Nhất</option>
                                    <option value="danang">Sân bay Đà Nẵng</option>
                                    <option value="camranh">Sân bay Cam Ranh</option>
                                    <option value="phuquoc">Sân bay Phú Quốc</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="radio" id="airport-dropoff" name="airport_trip_option" class="card-radio" checked hidden>
                                <label for="airport-dropoff" class="card-radio-label w-100">
                                    <div class="card-radio-content p-3 rounded-3 border" style="background:#fffbe6;">
                                        <div class="card-radio-title-row mb-2">
                                            <span class="card-radio-check"></span>
                                            <span class="fw-bold text-orange card-radio-title">Đưa khách đến sân bay</span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Giờ đón khách tại điểm đón <span class="text-danger">*</span></label>
                                            <input type="text" id="airport-dropoff-time" class="form-control py-3 rounded-pill" placeholder="Chọn ngày và giờ">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Điểm đón khách <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control py-3 rounded-pill" name="airport_pickup" placeholder="Nhập địa chỉ điểm đón khách" required>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" id="airport-pickup" name="airport_trip_option" class="card-radio" hidden>
                                <label for="airport-pickup" class="card-radio-label w-100">
                                    <div class="card-radio-content p-3 rounded-3 border bg-light">
                                        <div class="card-radio-title-row mb-2">
                                            <span class="card-radio-check"></span>
                                            <span class="fw-bold text-gray card-radio-title">Trả khách từ sân bay</span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Giờ đón khách tại sân bay <span class="text-danger">*</span></label>
                                            <input type="text" id="airport-pickup-time" class="form-control py-3 rounded-pill" placeholder="Chọn ngày và giờ" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Điểm trả khách <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control py-3 rounded-pill" name="airport_dropoff" placeholder="Nhập địa chỉ điểm trả khách" required disabled>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Đưa đón điểm cố định -->
                    <div class="trip-group-section d-none" id="fixedpoint-section">
                        <div class="p-4 bg-light rounded-3">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Giờ đón khách <span class="text-danger">*</span></label>
                                <input type="text" id="fixedpoint-time" class="form-control py-3 rounded-pill" placeholder="Chọn ngày và giờ">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Điểm xuất phát <span class="text-danger">*</span></label>
                                <input type="text" id="fixedpoint-start" name="fixedpoint_start" class="form-control py-3 rounded-pill" placeholder="Nhập địa chỉ điểm xuất phát" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Điểm kết thúc <span class="text-danger">*</span></label>
                                <input type="text" id="fixedpoint-end" name="fixedpoint_end" class="form-control py-3 rounded-pill" placeholder="Nhập địa chỉ điểm kết thúc" required>
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
                        <select name="car_type" required class="form-select py-3 rounded-pill">
                            <option value="5">5 seats (Standard)</option>
                            <option value="7">7 seats</option>
                            <option value="10">10 seats</option>
                        </select>
                    </div>

                    <button id="find-trip-btn" class="btn btn-warning w-100 py-3 rounded-pill fw-bold" style="font-size:1.2rem;">Tìm chuyến xe</button>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                <div class="card p-4 shadow-sm border-0" style="border-radius:1.2rem;">
                    <div class="fw-bold mb-2">Kết quả tìm kiếm</div>
                    <div id="search-results-list">
                        <!-- Search results will appear here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('clients.partials.Transport_booking.transport_bookinginfo')
    @include('clients.partials.Transport_booking.transport_booking_confirmation')
</div>

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">

<style>
body, .fw-bold, h1, h2, label, button, input, select {
    font-family: 'Montserrat', Arial, sans-serif;
}
.step {
    font-size: 15px;
    width: 90px;
    height: 90px;
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
    margin: 0 8px;
}
.step span {
    font-size: 13px;
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
    box-shadow: 0 2px 16px rgba(0,0,0,0.08);
}
.btn-toggle {
    background-color: #fff;
    border: 2px solid #ffc107;
    color: #000;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
}
.btn-toggle.active-tab, .btn-toggle:hover {
    background: #ffc107;
    color: #fff;
    border-color: #ffc107;
}
.form-select, .form-control {
    font-size: 1.08rem;
    border-radius: 2rem;
    padding-left: 1.2rem;
}
.card-radio-label {
    cursor: pointer;
    width: 100%;
}
.card-radio-content {
    transition: box-shadow 0.2s;
}
.card-radio-label:active .card-radio-content, .card-radio-label:focus .card-radio-content {
    box-shadow: 0 0 0 2px #ffc107;
}
@media (max-width: 991px) {
    .booking-step .row > div { margin-bottom: 1.5rem; }
    .card { padding: 1.5rem !important; }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
// --- TÁCH LOGIC CẬP NHẬT SUMMARY BƯỚC 2 ---
function updateStep2Summary() {
    // Ẩn cả ba summary trước
    document.getElementById('summary-airport').style.display = 'none';
    document.getElementById('summary-airport-return').style.display = 'none';
    document.getElementById('summary-fixedpoint').style.display = 'none';
    // Xác định loại booking
    let bookingType = 'airport';
    let airportMode = 'dropoff'; // default: đưa khách đến sân bay
    // Kiểm tra tab đang active
    if (document.getElementById('fixedpoint-section') && !document.getElementById('fixedpoint-section').classList.contains('d-none')) {
        bookingType = 'fixedpoint';
    } else {
        // Kiểm tra radio đưa khách đến sân bay hay trả khách từ sân bay
        const dropoffRadio = document.getElementById('airport-dropoff');
        if (dropoffRadio && !dropoffRadio.checked) {
            airportMode = 'pickup'; // trả khách từ sân bay
        }
    }
    if (bookingType === 'airport' && airportMode === 'dropoff') {
        document.getElementById('summary-airport').style.display = '';
        // Sân bay
        if(document.getElementById('form-for-select')) {
            document.querySelector('.summary-airport').textContent = document.getElementById('form-for-select').options[document.getElementById('form-for-select').selectedIndex].text;
        }
        // Giờ đón
        document.querySelector('.summary-pickup-time').textContent = document.getElementById('airport-dropoff-time').value;
        // Điểm đón
        document.querySelector('.summary-pickup-point').textContent = document.querySelector('input[name="airport_pickup"]').value;
        // Loại xe
        document.querySelector('.summary-car-type').textContent = document.querySelector('select[name="car_type"]').options[document.querySelector('select[name="car_type"]').selectedIndex].text;
        // Giá xe
        document.querySelector('.summary-car-price').textContent = document.getElementById('summary-trip-price') ? document.getElementById('summary-trip-price').textContent : '';
    } else if (bookingType === 'airport' && airportMode === 'pickup') {
        document.getElementById('summary-airport-return').style.display = '';
        if(document.getElementById('form-for-select')) {
            document.querySelector('.summary-airport-return').textContent = document.getElementById('form-for-select').options[document.getElementById('form-for-select').selectedIndex].text;
        }
        document.querySelector('.summary-pickup-time-return').textContent = document.getElementById('airport-pickup-time').value;
        document.querySelector('.summary-dropoff-point-return').textContent = document.querySelector('input[name="airport_dropoff"]').value;
        document.querySelector('.summary-car-type-return').textContent = document.querySelector('select[name="car_type"]').options[document.querySelector('select[name="car_type"]').selectedIndex].text;
        document.querySelector('.summary-car-price-return').textContent = document.getElementById('summary-trip-price') ? document.getElementById('summary-trip-price').textContent : '';
    } else {
        document.getElementById('summary-fixedpoint').style.display = '';
        document.querySelector('.summary-fixedpoint-start').textContent = document.querySelector('input[name="fixedpoint_start"]').value;
        document.querySelector('.summary-fixedpoint-time').textContent = document.getElementById('fixedpoint-time').value;
        document.querySelector('.summary-fixedpoint-end').textContent = document.querySelector('input[name="fixedpoint_end"]').value;
        document.querySelector('.summary-fixedpoint-car-type').textContent = document.querySelector('select[name="car_type"]').options[document.querySelector('select[name="car_type"]').selectedIndex].text;
        document.querySelector('.summary-fixedpoint-car-price').textContent = document.getElementById('summary-trip-price') ? document.getElementById('summary-trip-price').textContent : '';
    }
}

document.querySelectorAll('.btn-toggle').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.btn-toggle').forEach(b => b.classList.remove('active-tab'));
        this.classList.add('active-tab');
        const target = this.dataset.target;
        document.querySelectorAll('.trip-group-section').forEach(section => section.classList.add('d-none'));
        document.getElementById(`${target}-section`).classList.remove('d-none');
        // Cập nhật lại summary khi đổi tab
        updateStep2Summary();
    });
});

document.querySelectorAll('.trip-option-toggle').forEach(radio => {
    radio.addEventListener('change', function() {
        const value = this.value;
        document.querySelectorAll('#airport-section .trip-section').forEach(section => section.classList.add('d-none'));
        document.getElementById(`airport-${value}-section`).classList.remove('d-none');
    });
});

// Disable/enable form fields theo radio
function toggleCardFields() {
    const dropoffChecked = document.getElementById('airport-dropoff').checked;
    document.querySelectorAll('#airport-dropoff + .card-radio-label input, #airport-dropoff + .card-radio-label button, #airport-dropoff + .card-radio-label .fa-trash').forEach(el => {
        el.disabled = !dropoffChecked;
    });
    document.querySelectorAll('#airport-pickup + .card-radio-label input, #airport-pickup + .card-radio-label button, #airport-pickup + .card-radio-label .fa-trash').forEach(el => {
        el.disabled = dropoffChecked;
    });
}
document.getElementById('airport-dropoff').addEventListener('change', toggleCardFields);
document.getElementById('airport-pickup').addEventListener('change', toggleCardFields);
toggleCardFields();

flatpickr("#airport-dropoff-time", {
    enableTime: true,
    dateFormat: "d/m/Y, H:i",
});
flatpickr("#airport-pickup-time", {
    enableTime: true,
    dateFormat: "d/m/Y, H:i",
});
flatpickr("#fixedpoint-time", {
    enableTime: true,
    dateFormat: "d/m/Y, H:i",
});

document.getElementById('find-trip-btn').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent form submission

    // Mock search results
    const results = [
        { name: 'Xanh Plus', price: '300.000', logo: 'Logo hãng', logoBg: 'bg-warning text-dark' },
        { name: 'GrabCar 7 chỗ', price: '450.000', logo: 'Logo Grab', logoBg: 'bg-success text-white' }
    ];

    const resultsContainer = document.getElementById('search-results-list');
    resultsContainer.innerHTML = ''; // Clear previous results

    results.forEach(result => {
        const resultEl = document.createElement('div');
        resultEl.className = 'border-bottom py-2 d-flex justify-content-between align-items-center trip-option';
        resultEl.style.cursor = 'pointer';
        resultEl.dataset.name = result.name;
        resultEl.dataset.price = result.price;
        resultEl.dataset.logo = result.logo;
        resultEl.dataset.logobg = result.logoBg;

        resultEl.innerHTML = `
            <span><span class="badge ${result.logoBg} me-2">${result.logo}</span> ${result.name}</span>
            <span class="text-warning fw-bold">${result.price}</span>
        `;
        resultsContainer.appendChild(resultEl);
    });

    
});

document.getElementById('search-results-list').addEventListener('click', function(e) {
    const selectedTrip = e.target.closest('.trip-option');
    if (!selectedTrip) return;

    const name = selectedTrip.dataset.name;
    const price = selectedTrip.dataset.price;
    const logo = selectedTrip.dataset.logo;
    const logoBg = selectedTrip.dataset.logobg;

    // Update summary in step 2
    const summaryDetails = document.getElementById('summary-trip-details');
    const summaryPrice = document.getElementById('summary-trip-price');
    
    if (summaryDetails && summaryPrice) {
        summaryDetails.innerHTML = `<span class="badge ${logoBg} me-2">${logo}</span>${name}<br><small class="ms-5 ps-1">Trọn gói</small>`;
        summaryPrice.textContent = price;
    }

    // Hide step 1 and show step 2
    document.querySelector('.booking-step.step-1').classList.add('d-none');
    document.querySelector('.booking-step.step-2').classList.remove('d-none');

    // Update stepper
    const steps = document.querySelectorAll('.step');
    steps[0].classList.remove('active');
    steps[1].classList.add('active');

    // Gọi cập nhật summary khi chuyển sang bước 2
    updateStep2Summary();
});

// Thêm sự kiện click cho stepper
function goToStep(step) {
    // Ẩn tất cả các bước
    document.querySelectorAll('.booking-step').forEach(function(el) {
        el.classList.add('d-none');
    });
    // Hiện bước được chọn
    var stepDiv = document.querySelector('.booking-step.step-' + step);
    if (stepDiv) stepDiv.classList.remove('d-none');
    // Cập nhật trạng thái stepper
    document.querySelectorAll('.step').forEach(function(el, idx) {
        if (idx === step - 1) el.classList.add('active');
        else el.classList.remove('active');
    });
    // Nếu là bước 3 thì cập nhật dữ liệu động
    if (step === 3) fillConfirmationStep();
}
document.querySelectorAll('.step').forEach(function(el) {
    el.style.cursor = 'pointer';
    el.addEventListener('click', function() {
        var step = parseInt(this.getAttribute('data-step'));
        goToStep(step);
    });
});

// --- BỔ SUNG: TỰ ĐỘNG ĐỔ DỮ LIỆU SANG BƯỚC 3 ---
function fillConfirmationStep() {
    // Lấy loại chuyến
    let tripType = '';
    let pickupAddress = '';
    let carType = '';
    let totalPrice = '';
    let airportSelect = document.getElementById('form-for-select');
    let carTypeSelect = document.querySelector('select[name="car_type"]');
    let isAirport = document.getElementById('airport-section') && !document.getElementById('airport-section').classList.contains('d-none');
    let isFixedPoint = document.getElementById('fixedpoint-section') && !document.getElementById('fixedpoint-section').classList.contains('d-none');
    let isDropoff = document.getElementById('airport-dropoff').checked;
    // Loại chuyến
    if (isAirport) {
        if (isDropoff) {
            tripType = 'Đưa khách đến sân bay';
            pickupAddress = document.querySelector('input[name="airport_pickup"]').value;
        } else {
            tripType = 'Trả khách từ sân bay';
            pickupAddress = document.querySelector('input[name="airport_dropoff"]').value;
        }
    } else if (isFixedPoint) {
        tripType = 'Đưa đón điểm cố định';
        pickupAddress = document.querySelector('input[name="fixedpoint_start"]').value + ' → ' + document.querySelector('input[name="fixedpoint_end"]').value;
    }
    // Loại xe
    if (carTypeSelect) {
        carType = carTypeSelect.options[carTypeSelect.selectedIndex].text;
    }
    // Tổng tiền
    let priceEl = document.getElementById('summary-trip-price');
    if (priceEl) totalPrice = priceEl.textContent;
    // Thông tin liên hệ hoặc người được đặt hộ
    let isBookingForOthers = document.getElementById('is-booking-for-others').checked;
    let contactName, contactPhone, contactEmail, contactNotes, contactLabel;
    if (isBookingForOthers) {
        contactName = document.getElementById('other-name').value;
        contactPhone = document.getElementById('other-phone').value;
        contactEmail = '';
        contactNotes = document.getElementById('contact-notes').value;
        contactLabel = 'Thông tin liên hệ (Đặt hộ cho người khác)';
    } else {
        contactName = document.getElementById('contact-name').value;
        contactPhone = document.getElementById('contact-phone').value;
        contactEmail = document.getElementById('contact-email').value;
        contactNotes = document.getElementById('contact-notes').value;
        contactLabel = 'Thông tin liên hệ';
    }
    // Gán dữ liệu sang bước 3
    document.getElementById('confirm-trip-type').textContent = tripType;
    document.getElementById('confirm-pickup-address').textContent = pickupAddress;
    document.getElementById('confirm-car-type').textContent = carType;
    document.getElementById('confirm-total-price').textContent = totalPrice;
    // Cập nhật label
    let labelEl = document.querySelector('.booking-step.step-3 .fw-bold.mb-3');
    if(labelEl) labelEl.textContent = contactLabel;
    document.getElementById('confirm-contact-name').textContent = contactName;
    document.getElementById('confirm-contact-phone').textContent = contactPhone;
    document.getElementById('confirm-contact-email').textContent = contactEmail;
    document.getElementById('confirm-contact-notes').textContent = contactNotes;
    // Địa chỉ liên hệ (nếu có thể lấy)
    let contactAddress = '';
    if (isAirport && isDropoff) {
        contactAddress = pickupAddress;
    } else if (isAirport && !isDropoff) {
        contactAddress = document.querySelector('input[name="airport_dropoff"]').value;
    } else if (isFixedPoint) {
        contactAddress = document.querySelector('input[name="fixedpoint_end"]').value;
    }
    document.getElementById('confirm-contact-address').textContent = contactAddress;
}

document.addEventListener('DOMContentLoaded', function() {
    var btnStep2Next = document.getElementById('btn-step2-next');
    if (btnStep2Next) {
        btnStep2Next.addEventListener('click', function() {
            goToStep(3);
        });
    }
});
</script>

@include('clients.blocks.footer_hotel')

@vite(['resources/css/app.css', 'resources/js/app.js'])