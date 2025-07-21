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
        Schema::create('amenity_hotel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('amenity_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');
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
        Schema::dropIfExists('amenity_hotel');
    }
};
