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
        Schema::create('order_tables', function (Blueprint $table) {
            $table->id();
            $table->String('user_id');
            $table->string('invoice_number');
            $table->String('payment_type');
            $table->String('total');
            $table->String('status')->default('pending');
             $table->String('sub_total');
            $table->String('cupondiscount')->nullable();
            $table->String('delever_charge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tables');
    }
};