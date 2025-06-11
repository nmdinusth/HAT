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
        Schema::create('booking_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade'); // Booking nào
            $table->string('room_name'); // Tên phòng đã đặt
            $table->unsignedTinyInteger('adults')->default(1); // Người lớn/phòng
            $table->unsignedTinyInteger('children')->default(0); // Trẻ em/phòng
            $table->text('special_request')->nullable(); // Yêu cầu đặc biệt
            $table->decimal('price_per_night', 10, 2); // Giá mỗi đêm
            $table->integer('night'); // Số đêm
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
        Schema::dropIfExists('booking_rooms');
    }
};
