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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // Thuộc khách sạn nào
            $table->string('name'); // Tên loại phòng (Deluxe, Suite, Standard...)
            $table->text('description')->nullable(); // Mô tả loại phòng
            $table->decimal('base_price', 10, 2); // Giá cơ bản / đêm
            $table->string('max_guest'); // vd 3 người lớn, 2 người lớn 1 trẻ em
            $table->string('max_adult'); 
            $table->string('max_children')->nullable();
            $table->integer('size_sqm'); // Diện tích phòng m2
            $table->string('bed_type'); // Loại giường (queen, king...) vd 3 giường đơn, 1 giường king
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
        Schema::dropIfExists('room_types');
    }
};
