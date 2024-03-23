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
            $table->string('title');
            $table->string('image');
            $table->string('type')->nullable();
            $table->string('vendor');
            $table->string('handle')->nullable();
            $table->string('owner');
            $table->decimal('price', 8, 2);
            $table->decimal('compare_at_price', 8, 2)->nullable();

            $table->string('stock_status')->nullable();
            $table->integer('quantity')->nullable();
            $table->dateTime('published_at');
            $table->string('tags')->nullable();
            //$table->json('images')->nullable();
            $table->string('full_permalink');
            $table->text('content');
            $table->string('meta')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('image_id')->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->timestamps();
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
