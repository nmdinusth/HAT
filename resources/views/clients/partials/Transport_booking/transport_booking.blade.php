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
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="radio" id="airport-dropoff" name="airport_trip_option" class="card-radio" checked hidden>
                                <label for="airport-dropoff" class="card-radio-label">
                                    <div class="card-radio-content">
                                        <div class="card-radio-title-row">
                                            <span class="card-radio-check"></span>
                                            <span class="fw-bold text-orange card-radio-title">Đưa khách đến sân bay</span>
                                        </div>
                                        <div class="mt-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giờ đón khách tại điểm đón <span class="text-danger">*</span></label>
                                                <input type="text" id="airport-dropoff-time" class="form-control" placeholder="Chọn ngày và giờ">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Điểm đón khách <span class="text-danger">*</span></label>
                                                <div class="p-2 bg-white border rounded mb-2">
                                                    <div class="fw-bold">Highlands Nguyễn Hoàng</div>
                                                    <div class="small">Số 6, đường Nguyễn Hoàng, phường Mỹ Đình 2, quận Nam Từ Liêm, Tp. Hà Nội</div>
                                                    <button class="btn btn-sm btn-link text-danger"><i class="fa fa-trash"></i></button>
                                                </div>
                                                <input type="text" class="form-control mb-2" placeholder="Tìm địa điểm">
                                                <button class="btn btn-warning btn-sm w-100 mt-1">+ Thêm điểm đón</button>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" id="airport-pickup" name="airport_trip_option" class="card-radio" hidden>
                                <label for="airport-pickup" class="card-radio-label">
                                    <div class="card-radio-content">
                                        <div class="card-radio-title-row">
                                            <span class="card-radio-check"></span>
                                            <span class="fw-bold text-gray card-radio-title">Trả khách từ sân bay</span>
                                        </div>
                                        <div class="mt-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giờ đón khách tại sân bay <span class="text-danger">*</span></label>
                                                <input type="text" id="airport-pickup-time" class="form-control" placeholder="Chọn ngày và giờ" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Điểm trả khách <span class="text-danger">*</span></label>
                                                <div class="p-2 bg-white border rounded mb-2">
                                                    <div class="fw-bold">Highlands Nguyễn Hoàng</div>
                                                    <div class="small">Số 6, đường Nguyễn Hoàng, phường Mỹ Đình 2, quận Nam Từ Liêm, Tp. Hà Nội</div>
                                                    <button class="btn btn-sm btn-link text-danger" disabled><i class="fa fa-trash"></i></button>
                                                </div>
                                                <input type="text" class="form-control mb-2" placeholder="Tìm địa điểm" disabled>
                                                <button class="btn btn-warning btn-sm w-100 mt-1" disabled>+ Thêm điểm trả khách</button>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Đưa đón điểm cố định -->
                    <div class="trip-group-section d-none" id="fixedpoint-section">
                        <div class="p-3 bg-light rounded">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Giờ đón khách <span class="text-danger">*</span></label>
                                <input type="text" id="fixedpoint-time" class="form-control" placeholder="Chọn ngày và giờ">
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
                            <option value="">5 seats (Standard)</option>
                            <option value="">7 seats</option>
                            <option value="">10 seats</option>
                        </select>
                        <div class="mt-2">
                            <span class="me-3"><i class="fas fa-user-friends"></i> 3</span>
                            <span><i class="fas fa-suitcase"></i> 3</span>
                        </div>
                    </div>

                    <button id="find-trip-btn" class="btn btn-warning w-100">Tìm chuyến xe</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
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
.transport-radio-list {
    list-style: none;
    border: 2px solid #007bff;
    border-radius: 12px;
    background: #fff;
    overflow: hidden;
    margin-bottom: 1rem;
}
.transport-radio-list li {
    padding: 0;
    margin: 0;
}
.transport-radio-list .border-end {
    border-right: 2px solid #007bff;
}
.transport-radio {
    width: 20px;
    height: 20px;
    color: #1976d2;
    accent-color: #1976d2;
    border: 2px solid #007bff;
    background: #fff;
    margin-right: 8px;
}
.transport-radio:checked {
    background: #1976d2;
    border-color: #1976d2;
}
.transport-radio + label {
    cursor: pointer;
}
.card-radio-label {
    display: block;
    border: 2px solid #eee;
    border-radius: 12px;
    padding: 18px 20px;
    background: #f8f8f8;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
    margin-bottom: 1rem;
    position: relative;
    min-height: 180px;
}
.card-radio:checked + .card-radio-label,
.card-radio:checked ~ .card-radio-label {
    border-color: #ff9900;
    background: #fffbe6;
    box-shadow: 0 2px 8px rgba(255, 153, 0, 0.08);
}
.card-radio-title-row {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    min-height: 32px;
}
.card-radio-check {
    margin-right: 8px;
    flex-shrink: 0;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: 2px solid #ff9900;
    background: #fff;
    display: inline-block;
    position: relative;
}
.card-radio:checked + .card-radio-label .card-radio-check {
    background: #ff9900;
    border-color: #ff9900;
}
.card-radio:checked + .card-radio-label .card-radio-check::after {
    content: '';
    display: block;
    width: 10px;
    height: 10px;
    background: #fff;
    border-radius: 50%;
    position: absolute;
    top: 5px;
    left: 5px;
}
.card-radio-title {
    font-size: 1.1em;
    line-height: 1;
    white-space: nowrap;
    display: inline-block;
}
.card-radio-label .fw-bold.text-orange {
    color: #ff9900;
}
.card-radio-label .fw-bold.text-gray {
    color: #888;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
});

document.getElementById('btn-step2-next').addEventListener('click', function() {
    // 1. Get data from Step 1 (selected trip)
    const tripDetailsHTML = document.getElementById('summary-trip-details').innerHTML;
    const tripPrice = document.getElementById('summary-trip-price').textContent;
    const pickupTime = document.getElementById('airport-dropoff-time').value || document.getElementById('airport-pickup-time').value;

    // 2. Get data from Step 2 (contact info)
    const salutation = document.getElementById('contact-salutation').value;
    const contactName = document.getElementById('contact-name').value;
    const contactAddress = document.getElementById('contact-address').value;
    const phoneCode = document.getElementById('contact-phone-code').value;
    const phoneNumber = document.getElementById('contact-phone').value;
    const contactEmail = document.getElementById('contact-email').value;
    const contactNotes = document.getElementById('contact-notes').value;

    // 3. Populate Step 3 (confirmation)
    document.getElementById('confirm-car-type').innerHTML = tripDetailsHTML;
    document.getElementById('confirm-total-price').textContent = tripPrice;
    
    document.getElementById('confirm-contact-name').textContent = `${salutation} ${contactName}`;
    document.getElementById('confirm-contact-phone').textContent = `${phoneCode} ${phoneNumber}`;
    document.getElementById('confirm-contact-email').textContent = contactEmail;
    document.getElementById('confirm-contact-address').textContent = contactAddress;
    document.getElementById('confirm-contact-notes').textContent = contactNotes;
    document.getElementById('confirm-notes-details').value = contactNotes;

    // Populate summary on the right
    document.getElementById('summary-pickup-time-step3').textContent = pickupTime;
    document.getElementById('summary-trip-details-step3').innerHTML = tripDetailsHTML;
    document.getElementById('summary-trip-price-step3').textContent = tripPrice;

    // 4. Hide Step 2 and Show Step 3
    document.querySelector('.booking-step.step-2').classList.add('d-none');
    document.querySelector('.booking-step.step-3').classList.remove('d-none');

    // 5. Update stepper
    const steps = document.querySelectorAll('.step');
    steps[1].classList.remove('active');
    steps[2].classList.add('active');
});
</script>

@include('clients.blocks.footer')