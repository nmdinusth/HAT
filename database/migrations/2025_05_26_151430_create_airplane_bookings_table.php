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
        Schema::create('airplane_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->date('depart');
            $table->date('return')->nullable();
            $table->integer('passenger');
            $table->string('email');
            $table->string('phone');
            $table->string('id_type'); // passport, cccd, etc
            $table->string('id_number');
            $table->date('id_expiry');
            $table->string('nationality');
            $table->string('gender');
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
        Schema::dropIfExists('airplane_bookings');
    }
};
