@include('clients.blocks.header_home')
@include('clients.blocks.banner_home')

{{-- 
    Các giá trị sẽ đưuọc nhận 
        - Tên thành phố, địa điểm, tên khách sạn
        - Ngày nhận và trả phòng
        - Số đêm
        - Khách và phòng
--}}
<div class="container">
    <form action="{{ route('hotel.find') }}" method="POST">
        @csrf
        <h1>địa điểm</h1>
        <input type="text" name="location">
        <h1>Ngày nhận và trả phòng</h1>
        <div class="input-group">
            <input type="text" class="form-control" id="date-range" placeholder="Select Date Range" name="ranger_date">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                </span>
            </div>
        </div>
        <h1>khách và phòng</h1>
        <input type="text" name="guests_and_rooms" value="2 người lớn, 1 Trẻ em, 1 phòng">
    
        <input type="submit" value="phaii">

    </form>
</div>

@include('clients.blocks.footer_home')


<script></script>
