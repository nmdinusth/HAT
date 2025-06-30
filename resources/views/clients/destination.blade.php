@include('clients.blocks.header_home')
@include('clients.blocks.banner')

<!-- Popular Destinations Area start -->
<section class="popular-destinations-area pt-100 pb-90 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-40" data-aos="fade-up" data-aos-duration="1500"
                    data-aos-offset="50">
                    <h2>Khám phá các điểm đến phổ biến</h2>
                    <p>Website <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> trải nghiệm phổ
                        biến nhất mà bạn sẽ nhớ</p>
                    <ul class="destinations-nav mt-30">
                        <li data-filter="*" class="active">Tất cả</li>
                        <li data-filter=".domain-b">Miền Bắc</li>
                        <li data-filter=".domain-t">Miền Trung</li>
                        <li data-filter=".domain-n">Miền Nam</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gap-10 destinations-active justify-content-center">
                

            </div>
        </div>
    </div>
</section>
<!-- Popular Destinations Area end -->

@include('clients.blocks.new_letter')
@include('clients.blocks.footer')
