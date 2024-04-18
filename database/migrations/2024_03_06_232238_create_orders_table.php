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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('contact_email');
            $table->dateTime('ordered_at');
            $table->string('financial_status')->nullable();

            $table->decimal('total_price', 10, 2);
            $table->decimal('total_price_usd', 10, 2);
            $table->decimal('subtotal_price', 10, 2);
            $table->decimal('total_tax', 10, 2);
            $table->boolean('taxes_included' )->default(false);
            $table->decimal('total_discounts')->dafault(0);

            $table->decimal('total_line_items_price', 10, 2)->nullable();
            $table->decimal('total_weight', 10, 2)->default(0)->nullable();


            $table->string('total_tip_received')->nullable();


            //$table->json('billing_address')->nullable();

            $table->string('currency');
            $table->string('country_code');
  
            $table->string('customer_locale')->nullable();

            $table->dateTime('closed_at')->nullable();
            $table->boolean('confirmed')->nullable();

            $table->string('discount_codes')->nullable();
            $table->string('payment_gateway_names')->nullable();
            $table->string('phone')->nullable();
            $table->string('presentment_currency')->nullable();
            $table->dateTime('processed_at')->nullable();
            $table->string('processing_method')->nullable();
            $table->string('reference')->nullable();
            $table->string('referring_site')->nullable();
            $table->string('source_identifier')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_url')->nullable();
            $table->string('tags')->nullable();
            $table->text('note')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
           
            $table->string('fulfillment_status')->nullable();
            $table->string('landing_site')->nullable();
            $table->string('landing_site_ref')->nullable();
            $table->integer('number')->nullable();
            $table->integer('order_number')->nullable();
            $table->string('order_status_url')->nullable();
        
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('line_item_id');
            $table->foreign('line_item_id')->references('id')->on('line_items')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
