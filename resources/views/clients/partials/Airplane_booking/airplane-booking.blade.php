@include('clients.blocks.header_home')
@include('clients.blocks.banner')

<section class="airplane-booking-area py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center d-flex justify-content-center gap-4">
                <label class="radio-circle">
                    <input type="radio" name="tripType" id="roundTrip" value="round" checked>
                    <span class="circle"></span>
                    <span class="label-text">Khứ hồi</span>
                </label>
                <label class="radio-circle">
                    <input type="radio" name="tripType" id="oneWay" value="oneway">
                    <span class="circle"></span>
                    <span class="label-text">Một chiều</span>
                </label>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <h2>Đặt vé máy bay</h2>
                    <p>Điền thông tin để tìm chuyến bay phù hợp</p>
                </div>
                <form id="airplaneBookingForm" method="POST" action="{{ route('airplane-booking') }}">
                    @csrf   
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fromPlace" class="form-label fw-bold">Từ</label>
                                <select id="fromPlace" name="from" required
                                    class="tw-block tw-py-2.5 tw-px-0 tw-w-full tw-text-sm tw-text-gray-500 tw-bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none dark:tw-text-gray-400 dark:tw-border-gray-700 focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 peer">
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
                                <select id="toPlace" name="to" required
                                    class="tw-block tw-py-2.5 tw-px-0 tw-w-full tw-text-sm tw-text-gray-500 tw-bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none dark:tw-text-gray-400 dark:tw-border-gray-700 focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 peer">
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
                                <input type="date" class="form-control shadow-none" id="departDate" name="depart" required>
                            </div>
                        </div>
                        <div class="col-md-6" id="returnDateGroup">
                            <div class="form-group">
                                <label for="returnDate" class="form-label fw-bold">Ngày về</label>
                                <input type="date" class="form-control shadow-none" id="returnDate" name="return">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passenger" class="form-label fw-bold">Số hành khách</label>
                                <input type="number" class="form-control shadow-none" id="passenger" name="passenger" min="1" value="1" required>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="theme-btn style-two w-100">
                                <span data-hover="Tìm chuyến bay">Tìm chuyến bay</span>
                                <i class="fal fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('clients.blocks.new_letter')
@include('clients.blocks.footer')

@vite(['resources/css/app.css', 'resources/js/app.js'])

<script>
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
</script>
