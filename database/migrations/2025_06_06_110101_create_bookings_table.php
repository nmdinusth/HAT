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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Người đặt phòng
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // Khách sạn
            $table->timestamp('booking_date')->useCurrent(); // Ngày đặt phòng
            $table->date('check_in_date'); // Ngày đến
            $table->date('check_out_date'); // Ngày đi

            $table->unsignedTinyInteger('adults')->default(1); // Số người lớn
            $table->unsignedTinyInteger('children')->default(0); // Số trẻ em
            $table->integer('rooms'); // Số phòng thuê

            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'checked_in', 'completed'])->default('pending'); // Trạng thái booking

            $table->decimal('total_amount', 10, 2); // Tổng tiền
            $table->enum('payment_method', ['full', 'deposit'])->default('deposit'); 
            // Hình thức thanh toán: toàn bộ hoặc đặt cọc

            $table->decimal('deposit_amount', 10, 2)->default(0); // Số tiền đặt cọc (thường = 50%)
            $table->decimal('amount_paid', 10, 2)->default(0); // Số tiền đã thanh toán
            $table->decimal('amount_due', 10, 2)->default(0); // Số tiền còn lại phải trả
            
            $table->enum('payment_status', ['unpaid', 'partial', 'paid', 'refunded'])->default('unpaid'); 
            // Trạng thái thanh toán: chưa thanh toán, đã đặt cọc, đã thanh toán toàn bộ

            $table->timestamp('paid_at')->nullable(); // Thời gian đã thanh toán

            $table->string('guest_name'); // Tên khách
            $table->string('guest_email'); // Email khách
            
            $table->timestamp('cancellation_date')->nullable(); // Ngày hủy
            $table->text('cancellation_reason')->nullable(); // Lý do hủy

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
        Schema::dropIfExists('bookings');
    }
};
