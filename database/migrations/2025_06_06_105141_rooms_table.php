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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_type_id')->constrained()->onDelete('cascade'); // Thuộc loại phòng nào
            $table->string('name'); // Tên phòng (nếu đặt riêng, optional)
            $table->string('room_number'); // Số phòng
            $table->integer('floor_number'); // Tầng
            $table->json('images')->nullable(); // Ảnh phòng (JSON)
            $table->enum('status', ['available', 'pending', 'booked', 'maintenance'])->default('available'); // Trạng thái phòng
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
        Schema::dropIfExists('rooms');
    }
};
