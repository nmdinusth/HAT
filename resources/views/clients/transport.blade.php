@include('clients.blocks.header_home')
@include('clients.blocks.banner')

<!-- Transport Services Area start -->
<section class="transport-services-area py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Dịch vụ vận chuyển</h2>
                    <p>Chúng tôi cung cấp các dịch vụ vận chuyển chất lượng cao với giá cả phải chăng</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="transport-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/transport/xanh.webp') }}" alt="Car Transport">
                    </div>
                    <div class="content">
                        <h4><a href="#">Di chuyển bằng xe điện</a></h4>
                        <p>Dịch vụ vận chuyển bằng ô tô chất lượng cao, đảm bảo an toàn và thoải mái cho hành khách.</p>
                        <ul class="features">
                            <li><i class="fas fa-charging-station"></i> Xe đời mới</li>
                            <li><i class="fas fa-tree"></i> Bảo vệ môi trường</li>   
                            <li><i class="fas fa-transporter"></i> Tài xế chuyên nghiệp</li>
                            <li><i class="fas fa-badge-percent""></i> Giá cả hợp lý</li>
                        </ul>
                        <a href="#" class="theme-btn style-two">
                            <span data-hover="Đặt ngay">Đặt ngay</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Transport Services Area end -->

@include('clients.blocks.new_letter')
@include('clients.blocks.footer') 