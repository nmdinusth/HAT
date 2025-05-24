@include('clients.blocks.header_home')
@include('clients.blocks.banner')

<style>
select.form-select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: none !important;
}

/* Ẩn pseudo-element nếu có */
select.form-select::-ms-expand { display: none; }
select.form-select::after { display: none !important; }
.form-select:after { display: none !important; }
/* Ẩn icon custom nếu có class arrow */
.form-select + .arrow, select + .arrow { display: none !important; }
</style>

<section class="airplane-booking-area py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <h2>Đặt vé máy bay</h2>
                    <p>Điền thông tin để tìm chuyến bay phù hợp</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form id="airplaneBookingForm" method="POST" action="{{ route('airplane-booking') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fromPlace" class="form-label fw-bold">Từ</label>
                                <select class="form-select shadow-none" id="fromPlace" name="from" required>
                                    <option value="">Chọn điểm đi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="toPlace" class="form-label fw-bold">Đến</label>
                                <select class="form-select shadow-none" id="toPlace" name="to" required>
                                    <option value="">Chọn điểm đến</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departDate" class="form-label fw-bold">Ngày đi</label>
                                <input type="date" class="form-control shadow-none" id="departDate" name="depart" required>
                            </div>
                        </div>
                        <div class="col-md-6">
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

let fromSelect, toSelect;
function updatePlaceOptions(type) {
  fromSelect = document.getElementById('fromPlace');
  toSelect = document.getElementById('toPlace');
  fromSelect.options.length = 0;
  toSelect.options.length = 0;
  fromSelect.add(new Option('Chọn điểm đi', ''));
  toSelect.add(new Option('Chọn điểm đến', ''));
  let list = [];
  if (type === 'domestic') {
    list = places.domestic;
  } else if (type === 'international') {
    list = places.domestic.concat(places.international);
  }
  list.forEach(place => {
    fromSelect.add(new Option(place.label, place.value));
    toSelect.add(new Option(place.label, place.value));
  });
  updateToOptions();
}
function updateToOptions() {
  Array.from(toSelect.options).forEach(opt => {
    opt.disabled = opt.value === fromSelect.value && opt.value !== '';
  });
  if (toSelect.value === fromSelect.value) {
    for (let i = 0; i < toSelect.options.length; i++) {
      if (!toSelect.options[i].disabled && toSelect.options[i].value !== '') {
        toSelect.selectedIndex = i;
        break;
      }
    }
  }
}
document.addEventListener('DOMContentLoaded', function() {
  const type = '{{ $type }}';
  updatePlaceOptions(type);
  fromSelect = document.getElementById('fromPlace');
  toSelect = document.getElementById('toPlace');
  fromSelect.addEventListener('change', updateToOptions);
  toSelect.addEventListener('change', updateToOptions);
  const today = new Date().toISOString().split('T')[0];
  document.getElementById('departDate').min = today;
  document.getElementById('returnDate').min = today;
  document.getElementById('departDate').addEventListener('change', function() {
    document.getElementById('returnDate').min = this.value;
  });
});
</script> 