@include('clients.blocks.header_hotel')
@include('clients.blocks.banner_hotel')

<!-- Airplane Services Area start -->
<section class="airplane-services-area py-100 rel z-1">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="font-size:2.5rem;">Dịch Vụ Hàng Không</h1>
            <p class="text-muted" style="font-size:1.2rem;">Chúng tôi cung cấp các dịch vụ hàng không chất lượng cao với giá cả cạnh tranh</p>
        </div>
        <div class="row justify-content-center g-5">
            <div class="col-md-5 d-flex justify-content-center">
                <div class="card border-0 text-center p-4 h-100" style="box-shadow:0 2px 16px rgba(0,0,0,0.06);">
                    <img src="{{ asset('clients/assets/images/airplane_booking/baynoidia.png') }}" alt="Chuyến bay nội địa" class="img-fluid rounded-4 mb-3" style="max-height:260px;object-fit:cover;">
                    <h3 class="fw-bold mb-2">Chuyến bay nội địa</h3>
                    <p class="text-muted mb-4">Khám phá Việt Nam với các chuyến bay nội địa tiện lợi và thoải mái.</p>
                    <a href="{{ route('airplane-booking.form', ['type'=>'domestic']) }}" class="btn btn-success px-4 py-2 rounded-pill fw-bold" style="font-size:1.1rem;">
                        Đặt Vé <span class="ms-2"><i class="fal fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-center">
                <div class="card border-0 text-center p-4 h-100" style="box-shadow:0 2px 16px rgba(0,0,0,0.06);">
                    <img src="{{ asset('clients/assets/images/airplane_booking/bayquocte.png') }}" alt="Chuyến bay quốc tế" class="img-fluid rounded-4 mb-3" style="max-height:260px;object-fit:cover;">
                    <h3 class="fw-bold mb-2">Chuyến bay quốc tế</h3>
                    <p class="text-muted mb-4">Khám phá thế giới với các chuyến bay quốc tế chất lượng cao.</p>
                    <a href="{{ route('airplane-booking.form', ['type'=>'international']) }}" class="btn btn-success px-4 py-2 rounded-pill fw-bold" style="font-size:1.1rem;">
                        Đặt Vé <span class="ms-2"><i class="fal fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
body, .fw-bold, h1, h3, label, button, input, select {
    font-family: 'Montserrat', Arial, sans-serif;
}
</style>

@include('clients.blocks.footer_hotel')
