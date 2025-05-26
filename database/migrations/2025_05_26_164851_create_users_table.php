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
            // $table->id();
            // $table->string('username')->unique()->nullable();
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password')->nullable();
            // $table->rememberToken();
            // $table->foreignId('role_id')->default(CUSTOMER_ROLE_ID)->constrained()->onDelete(action: 'cascade')->onUpdate('cascade');
            // $table->boolean('status')->default(false);
            // $table->string('otp')->nullable();
            // $table->timestamp('otp_expires_at')->nullable();
            // $table->string('login_token',64)->nullable();
            // $table->timestamp('login_token_expires_at')->nullable();
            // $table->timestamps();

            $table->id();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('email_verification_token')->nullable();
            $table->timestamp('email_verification_expires_at')->nullable();

            $table->string('otp')->nullable();
            $table->timestamp('otp_expires_at')->nullable();

            $table->boolean('is_2fa_enabled')->default(false);
            $table->enum('status', ['pending', 'active', 'suspended'])->default('pending');

            $table->foreignId('role_id')->default(CUSTOMER_ROLE_ID)->constrained()->onDelete('cascade')->onUpdate('cascade');
            
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
