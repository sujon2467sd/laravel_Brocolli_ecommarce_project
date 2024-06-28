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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('code')->nullable();
            $table->string('sku')->nullable();
            $table->decimal('mrp_price', 8, 2)->nullable();
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->decimal('price')->nullable();
            $table->integer('current_stock')->nullable();
            $table->integer('minimum_qty')->nullable();
            $table->decimal('sales', 8, 2)->nullable();
            $table->text('select_attributes')->nullable();
            $table->string('image_path')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_image_path')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('maincategories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};