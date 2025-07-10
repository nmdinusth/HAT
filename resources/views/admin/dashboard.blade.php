@include('admin.blocks.header')

<div class="container body">
    <div class="main_container">
        @include('admin.blocks.sidebar')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row" style="margin-top: 40px;">
                <div class="col-md-12 text-center">
                    <h2>Chào mừng bạn đến với trang quản trị Admin!</h2>
                    <p>Hãy chọn chức năng ở menu bên trái để quản lý User hoặc Transport Booking.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.blocks.footer')
