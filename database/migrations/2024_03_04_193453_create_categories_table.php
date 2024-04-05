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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('taxonomy');
            $table->string('handle')->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->dateTime('published_at');
            $table->boolean('available');
            $table->string('image')->nullable();
            //$table->json('images')->nullable();
            $table->string('sort_order')->nullable();
            $table->string('template_suffix')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
