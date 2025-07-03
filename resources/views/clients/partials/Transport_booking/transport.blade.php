@include('clients.blocks.header_hotel')
@include('clients.blocks.banner_hotel')

<!-- Transport Services Area start -->
<section class="transport-services-area py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h1 class="fw-bold" style="font-size:2.5rem;">Dịch Vụ Vận Chuyển</h1>
                    <p class="text-muted" style="font-size:1.2rem;">Chúng tôi cung cấp các dịch vụ vận chuyển chất lượng cao với giá cả phải chăng</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="card border-0 shadow-lg p-4 mb-4 text-center h-100">
                    <img src="{{ asset('clients/assets/images/transport_booking/xanh.jpg') }}" alt="Di chuyển bằng xe điện" class="img-fluid rounded-4 mb-3" style="max-height:260px;object-fit:cover;">
                    <h2 class="fw-bold mb-2">Di chuyển bằng xe điện</h2>
                    <p class="text-muted mb-4">Dịch vụ vận chuyển bằng ô tô chất lượng cao, đảm bảo an toàn và thoải mái cho hành khách.</p>
                    <ul class="list-unstyled mb-4 text-center d-inline-block mx-auto" style="font-size:1.1rem;">
                        <li class="mb-2"><i class="fas fa-charging-station me-2 text-success"></i> Xe đời mới</li>
                        <li class="mb-2"><i class="fas fa-tree me-2 text-success"></i> Bảo vệ môi trường</li>
                        <li class="mb-2"><i class="fas fa-user-tie me-2 text-success"></i> Tài xế chuyên nghiệp</li>
                        <li class="mb-2"><i class="fas fa-badge-percent me-2 text-success"></i> Giá cả hợp lý</li>
                    </ul>
                    <a href="{{ route('booking.transport') }}" class="btn btn-success px-5 py-3 rounded-pill fw-bold" style="font-size:1.2rem;">
                        Đặt Ngay <span class="ms-2"><i class="fal fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Transport Services Area end -->

{{-- @include('clients.blocks.new_letter') --}}
@include('clients.blocks.footer_hotel')

<style>
body, .fw-bold, h1, h2, label, button, input, select {
    font-family: 'Montserrat', Arial, sans-serif;
}
.card {
    border-radius: 1.5rem;
}
.btn-success {
    background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%);
    border: none;
    color: #fff;
    box-shadow: 0 2px 8px rgba(67,233,123,0.15);
    transition: background 0.3s;
}
.btn-success:hover {
    background: linear-gradient(90deg, #38f9d7 0%, #43e97b 100%);
    color: #fff;
}
.section-title h1 {
    letter-spacing: 1px;
}
</style> 