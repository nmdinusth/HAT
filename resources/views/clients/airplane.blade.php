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
                                        <select id="fromPlace" name="from" required></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="toPlace" class="form-label fw-bold">Đến</label>
                                        <select id="toPlace" name="to" required></select>
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
            <div class="col-lg-4 col-md-6">
                <div class="airplane-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/airplane_booking/baynoidia.png') }}" alt="Domestic Flights">
                    </div>
                    <div class="content">
                        <h4><a href="#">Chuyến bay nội địa</a></h4>
                        <p>Khám phá Việt Nam với các chuyến bay nội địa tiện lợi và thoải mái.</p>
                        <button class="theme-btn style-two" onclick="goToBooking('domestic')">
                            <span data-hover="Đặt vé">Đặt vé</span>
                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="airplane-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/airplane_booking/bayquocte.png') }}" alt="International Flights">
                    </div>
                    <div class="content">
                        <h4><a href="#">Chuyến bay quốc tế</a></h4>
                        <p>Khám phá thế giới với các chuyến bay quốc tế chất lượng cao.</p>
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

@include('clients.blocks.new_letter')
@include('clients.blocks.footer')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<style>
.choices__inner::after, .choices__inner::before {
  display: none !important;
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
document.addEventListener('DOMContentLoaded', function () {
  const type = "domestic";
  const fromSelect = document.getElementById('fromPlace');
  const toSelect = document.getElementById('toPlace');
  const list = (type === 'domestic') ? places.domestic : [...places.domestic, ...places.international];
  const fromChoices = new Choices(fromSelect, { searchEnabled: false, shouldSort: false, itemSelectText: '' });
  const toChoices = new Choices(toSelect, { searchEnabled: false, shouldSort: false, itemSelectText: '' });
  fromChoices.setChoices(list, 'value', 'label', true);
  toChoices.setChoices(list, 'value', 'label', true);
});

function goToBooking(type) {
  window.location.href = '/airplane-booking?type=' + type;
}
</script>
