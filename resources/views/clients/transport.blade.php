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
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="transport-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/transport/car.jpg') }}" alt="Car Transport">
                    </div>
                    <div class="content">
                        <h4><a href="#">Vận chuyển bằng ô tô</a></h4>
                        <p>Dịch vụ vận chuyển bằng ô tô chất lượng cao, đảm bảo an toàn và thoải mái cho hành khách.</p>
                        <ul class="features">
                            <li><i class="fas fa-check"></i> Xe đời mới</li>
                            <li><i class="fas fa-check"></i> Tài xế chuyên nghiệp</li>
                            <li><i class="fas fa-check"></i> Giá cả hợp lý</li>
                        </ul>
                        <a href="#" class="theme-btn style-two">
                            <span data-hover="Đặt ngay">Đặt ngay</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                <div class="transport-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/transport/train.jpg') }}" alt="Train Transport">
                    </div>
                    <div class="content">
                        <h4><a href="#">Vận chuyển bằng tàu hỏa</a></h4>
                        <p>Dịch vụ vận chuyển bằng tàu hỏa với các chuyến tàu hiện đại và tiện nghi.</p>
                        <ul class="features">
                            <li><i class="fas fa-check"></i> Toa tàu sạch sẽ</li>
                            <li><i class="fas fa-check"></i> Điều hòa nhiệt độ</li>
                            <li><i class="fas fa-check"></i> Giá vé ưu đãi</li>
                        </ul>
                        <a href="#" class="theme-btn style-two">
                            <span data-hover="Đặt ngay">Đặt ngay</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                <div class="transport-item">
                    <div class="image">
                        <img src="{{ asset('clients/assets/images/transport/plane.jpg') }}" alt="Air Transport">
                    </div>
                    <div class="content">
                        <h4><a href="#">Vận chuyển hàng không</a></h4>
                        <p>Dịch vụ vận chuyển hàng không với các hãng hàng không uy tín và chất lượng.</p>
                        <ul class="features">
                            <li><i class="fas fa-check"></i> Hãng hàng không uy tín</li>
                            <li><i class="fas fa-check"></i> Giá vé cạnh tranh</li>
                            <li><i class="fas fa-check"></i> Dịch vụ đa dạng</li>
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