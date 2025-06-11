<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name'); // Tên khách sạn
            $table->string('slug')->unique(); // Slug để tạo URL thân thiện
            $table->text('description')->nullable(); // Mô tả khách sạn
            $table->json('images')->nullable(); // Danh sách ảnh (JSON)
            $table->string('address'); // Địa chỉ chi tiết
            $table->unsignedBigInteger('district_id'); // Quận/huyện
            $table->unsignedBigInteger('city_id'); // Thành phố
            $table->string('cached_city_name'); // Tên thành phố cache lại để tránh join
            $table->decimal('latitude', 10, 7)->nullable(); // Vĩ độ
            $table->decimal('longitude', 10, 7)->nullable(); // Kinh độ
            $table->string('phone_number'); // Số điện thoại
            $table->string('email')->nullable(); // Email liên hệ
            $table->time('check_in_time')->default('14:00:00'); // Giờ check-in mặc định
            $table->time('check_out_time')->default('12:00:00'); // Giờ check-out mặc định
            $table->boolean('is_active')->default(true); // Trạng thái hoạt động
            $table->timestamps();
        });
    }
};
