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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->Boolean('accepts_marketing')->default(false);
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('orders_count');
            $table->string('state')->nullable();
            $table->string('total_spent',10,2);
            $table->integer('last_order_id')->nullable();
            $table->Boolean('verified_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('last_order_name')->nullable();
            $table->string('currency');


            $table->json('addresses')->nullable();
            $table->json('default_address')->nullable();

            $table->dateTime('registered_at');
            $table->string('gender')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
