@php
    // Ẩn breadcrumb nếu là trang airplane (đặt vé máy bay) hoặc transport (dịch vụ đưa đón)
    $isAirplane = request()->is('airplane*') || (isset($title) && Str::contains(Str::lower($title), 'máy bay'));
    $isTransport = request()->is('transport*') || (isset($title) && Str::contains(Str::lower($title), 'đưa đón'));
@endphp
<!-- Page Banner Start -->
<section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover">
    <div class="container">
        <div class="banner-inner text-white">
            <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">{{ $title }}
            </h2>
            @if(!$isAirplane && !$isTransport)
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
            @endif
        </div>
    </div>
</section>
<!-- Page Banner End -->