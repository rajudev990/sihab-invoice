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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->string('customer_id')->nullable();
             $table->string('invoice_date')->nullable();
            $table->string('due_date')->nullable();
            $table->string('subject')->nullable();
            $table->string('terms')->nullable();
            $table->decimal('total_amount',10,2)->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
