<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_seat_holds', function (Blueprint $table) {
            $table->id();
            $table->string('flight_code');
            $table->string('seat_code');
            $table->enum('status', ['hold', 'booked'])->default('hold');
            $table->string('user_session')->nullable();
            $table->timestamp('hold_expires_at');
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
        Schema::dropIfExists('airplane_seat_holds');
    }
};
