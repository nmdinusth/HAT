@include('clients.blocks.header_home')
@include('clients.blocks.banner')

<style>
/* Chỉ giữ lại style cho Choices.js, loại bỏ style select cũ */
.choices__inner::after, .choices__inner::before {
  display: none !important;
}

/* Loại bỏ mũi tên mặc định của trình duyệt */
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

/* Loại bỏ mọi background image mặc định */
.choices__inner,
.choices[data-type*='select-one']:after {
  background-image: none !important;
}

/* Xóa mũi tên mặc định của Choices.js */
.choices[data-type*='select-one']:after {
  border: none !important;
}

/* Tạo mũi tên tùy chỉnh */
.choices[data-type*='select-one']::before {
  content: '';
  position: absolute;
  top: 50%;
  right: 15px;
  width: 6px;
  height: 6px;
  border: solid #888;
  border-width: 0 2px 2px 0;
  transform: translateY(-50%) rotate(45deg);
  pointer-events: none;
}


</style>

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
                                <select id="fromPlace" name="from" required>
                                    <option value="" selected disabled hidden>Chọn điểm đi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="toPlace" class="form-label fw-bold">Đến</label>
                                <select id="toPlace" name="to" required>
                                    <option value="" selected disabled hidden>Chọn điểm đến</option>
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

<!-- Choices.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
const places = {
  domestic: [
    { value: 'hanoi', label: 'Hà Nội' },
    { value: 'danang', label: 'Đà Nẵng' },
    { value: 'hochiminh', label: 'Hồ Chí Minh City' },
    { value: 'nhatrang', label: 'Nha Trang' },
    { value: 'phuquoc', label: 'Phú Quốc' }
  ],
  international: [
    { value: 'newyork', label: 'New York' },
    { value: 'tokyo', label: 'Tokyo' },
    { value: 'paris', label: 'Paris' },
    { value: 'london', label: 'London' },
    { value: 'singapore', label: 'Singapore' }
  ]
};

document.addEventListener('DOMContentLoaded', function () {
  const type = "{{ $type }}";
  const fromSelect = document.getElementById('fromPlace');
  const toSelect = document.getElementById('toPlace');
  const list = (type === 'domestic') ? places.domestic : [...places.domestic, ...places.international];

  const fromChoices = new Choices(fromSelect, {
    searchEnabled: false,
    shouldSort: false,
    itemSelectText: '',
    position: 'auto'
  });

  const toChoices = new Choices(toSelect, {
    searchEnabled: false,
    shouldSort: false,
    itemSelectText: '',
    position: 'auto'
  });

  fromChoices.setChoices(list, 'value', 'label', false);
  toChoices.setChoices(list, 'value', 'label', false);

  // Tự động đóng dropdown ngay khi chọn để cập nhật giao diện lập tức
  fromSelect.addEventListener('choice', function () {
    fromChoices.hideDropdown();
  });

  toSelect.addEventListener('choice', function () {
    toChoices.hideDropdown();
  });

  // Kiểm tra trùng điểm đi và đến
  document.getElementById('airplaneBookingForm').addEventListener('submit', function (e) {
    if (fromSelect.value === toSelect.value) {
      alert("Điểm đi và điểm đến không được giống nhau!");
      e.preventDefault();
    }
  });
});
</script>
