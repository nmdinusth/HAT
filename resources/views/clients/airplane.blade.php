@include('clients.blocks.header_home')
@include('clients.blocks.banner')

<!-- Airplane Services Area start -->
<section class="airplane-services-area py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Dịch vụ hàng không</h2>
                    <p>Chúng tôi cung cấp các dịch vụ hàng không chất lượng cao với giá cả cạnh tranh</p>
                </div>
            </div>
        </div>

        <!-- Booking Modal -->
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="bookingModalLabel">Đặt vé máy bay</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form id="airplaneBookingForm">
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
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="airplane-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/airplane_booking/baynoidia.png') }}" alt="Domestic Flights">
                    </div>
                    <div class="content">
                        <h4><a href="#">Chuyến bay nội địa</a></h4>
                        <p>Khám phá Việt Nam với các chuyến bay nội địa tiện lợi và thoải mái.</p>
                        <ul class="features">
                            <li><i class="fas fa-check"></i> Nhiều hãng hàng không</li>
                            <li><i class="fas fa-check"></i> Giá vé cạnh tranh</li>
                            <li><i class="fas fa-check"></i> Đặt vé dễ dàng</li>
                        </ul>
                        <button class="theme-btn style-two" onclick="goToBooking('domestic')">
                            <span data-hover="Đặt vé">Đặt vé</span>
                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                <div class="airplane-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/airplane_booking/bayquocte.png') }}" alt="International Flights">
                    </div>
                    <div class="content">
                        <h4><a href="#">Chuyến bay quốc tế</a></h4>
                        <p>Khám phá thế giới với các chuyến bay quốc tế chất lượng cao.</p>
                        <ul class="features">
                            <li><i class="fas fa-check"></i> Hãng hàng không uy tín</li>
                            <li><i class="fas fa-check"></i> Giá vé hấp dẫn</li>
                            <li><i class="fas fa-check"></i> Hỗ trợ 24/7</li>
                        </ul>
                        <button class="theme-btn style-two" onclick="goToBooking('international')">
                            <span data-hover="Đặt vé">Đặt vé</span>
                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Airplane Services Area end -->

@include('clients.blocks.new_letter')
@include('clients.blocks.footer')

<style>
.booking-form { display: none; }
.booking-form.active { display: block; }
.booking-form .close-booking-form {
  position: absolute;
  top: 10px;
  right: 20px;
  background: none;
  border: none;
  font-size: 2rem;
  color: #888;
  cursor: pointer;
  z-index: 10;
}
</style>

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

let currentType = 'domestic';
let fromSelect;
let toSelect;

function updatePlaceOptions(type) {
  fromSelect = document.getElementById('fromPlace');
  toSelect = document.getElementById('toPlace');
  // Xóa hết options cũ
  fromSelect.options.length = 0;
  toSelect.options.length = 0;

  // Thêm option mặc định
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
  const today = new Date().toISOString().split('T')[0];
  document.getElementById('departDate').min = today;
  document.getElementById('returnDate').min = today;

  document.getElementById('departDate').addEventListener('change', function() {
    document.getElementById('returnDate').min = this.value;
  });

  fromSelect = document.getElementById('fromPlace');
  toSelect = document.getElementById('toPlace');
  fromSelect.addEventListener('change', updateToOptions);
  toSelect.addEventListener('change', updateToOptions);

  document.getElementById('airplaneBookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('{{ route("airplane-booking") }}', {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
        const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
        modal.hide();
        this.reset();
      } else {
        alert('Có lỗi xảy ra. Vui lòng thử lại.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Có lỗi xảy ra. Vui lòng thử lại.');
    });
  });

  // Gán sự kiện cho nút đặt vé
  document.querySelectorAll('.open-booking-modal').forEach(btn => {
    btn.addEventListener('click', function() {
      currentType = this.getAttribute('data-type');
      updatePlaceOptions(currentType);
      const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
      modal.show();
    });
  });
});

function goToBooking(type) {
    window.location.href = '/airplane-booking?type=' + type;
}
</script>

<!-- Bootstrap JS (bắt buộc cho modal hoạt động) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
