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
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên tiện nghi (Wifi, TV, Hồ bơi...)
            $table->enum('type', ['hotel', 'room']); // Loại tiện nghi (cho khách sạn hay phòng)
            $table->string('icon')->nullable(); // Link hoặc tên class icon (fontawesome)
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
        Schema::dropIfExists('amenities');
    }
};
