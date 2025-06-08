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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique(); //Tên người dùng 
            $table->string('email')->unique(); 
            // $table->string('email'); 
            $table->string('password');

            $table->string('email_verification_token')->nullable(); // đoạn token xác nhận email được dùng dể gửi đén email đã đăng ký
            $table->timestamp('email_verification_expires_at')->nullable(); // thời gian hết hạn

            $table->string('otp_code')->nullable(); //otp xác thực 2 bước
            $table->timestamp('otp_expires_at')->nullable(); //thời gian hết hạn

            $table->boolean('is_2fa_enabled')->default(false); //bật tắt xác thực 2 bước
            $table->enum('status', ['pending', 'active', 'suspended'])->default('pending'); // tragj thái người dùng

            $table->foreignId('role_id')->default(CUSTOMER_ROLE_ID)->constrained()->onDelete('cascade')->onUpdate('cascade'); //quyền của tài khoản, mặc định là khách hàng, check trong config/app
            
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
        Schema::dropIfExists('users');
    }
};
