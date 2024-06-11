<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('email')->unique();

            $table->Boolean('accepts_marketing')->default(false);
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('orders_count')->default(0);
            $table->string('state')->nullable();
            $table->string('total_spent',10,2)->default(0);
            $table->integer('last_order_id')->nullable();
            $table->Boolean('verified_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('last_order_name')->nullable();
            $table->string('currency')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->default(0);
            /* Customers: 0=>Customer, 1=>Admin, 2=>Manager */
            $table->string('password');
            
            $table->rememberToken();

            $table->json('addresses')->nullable();
            $table->json('default_address')->nullable();
            $table->timestamp('registered_at')->useCurrent();
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
