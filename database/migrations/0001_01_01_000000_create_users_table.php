<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('password');
            $table->string('staff_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('position_id')->nullable();
            $table->string('email')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('image')->nullable();
            $table->string('country')->nullable();
            $table->string('nationality')->nullable();
            $table->string('level')->nullable();
            $table->string('join_date')->nullable();
            $table->string('iqan')->nullable();
            $table->decimal('basic_salary', 10, 2)->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('gender')->nullable();
            $table->string('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
