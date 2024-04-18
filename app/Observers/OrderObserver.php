<?php

namespace App\Observers;

use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $order=[
            'id'=>$order->id,
            'contact_email' => $order->contact_email,
            'ordered_at' => $order->order_at,
            'financial_status' => $order->financial_status,
            'total_price' => $order->total_price,
            'total_price_usd' => $order->total_price_usd,
            'subtotal_price' => $order->subtotal_price,
            'total_tax' => $order->total_tax,
            'taxes_included' => $order->taxes_included,
            'total_discounts' => $order->total_discounts,
            'total_line_items_price' => $order->total_line_items_price,
            'total_weight' => $order->total_weight,
            'total_tip_received' => $order->total_tip_received,
                //'billing_address' => $order->address,
            'currency' => $order->currency,
            'country_code' => $order->country_code,
            'customer_locale' => $order->customer_locale,
            'closed_at' => $order->close_at,
            'confirmed' => $order->confirmed,
            'discount_codes' => $order->discount_codes,
            'payment_gateway_names' => $order->payment_gateway_names,
            'phone' => $order->phone,
            'presentment_currency' => $order->presentment_currency,
            'processed_at' => $order->process_at,
            'processing_method' => $order->processing_method,
            'reference' => $order->reference,
            'referring_site' => $order->referring_site,
            'source_identifier' => $order->source_identifier,
            'source_name' => $order->source_name,
            'source_url' => $order->source_url,
            'tags' => $order->tags,
            'note' => $order->note,
            'name' =>  $order->name,
            'email' => $order->email,
            'fulfillment_status' => $order->fulfillment_status,
            'landing_site' => $order->landing_site,
            'landing_site_ref' => $order->landing_site_ref,
            'number' => $order->number,
            'order_number' => $order->order_number,
            'order_status_url' => $order->order_status_url,
            'customer_id' => $order->customer_id,
            'line_items'  => $order->line_item_id,
            ];


        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/orders/create', $order);
        if ($response->successful()) {
                Log::info('Successfully Creating Order With ID :' . json_encode($order));
            } else {
                Log::error('Error creating Order in Converted.in');
            }
        }
    

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {   
        $order=[
            'id'=>$order->id,
            'contact_email' => $order->contact_email,
            'ordered_at' => $order->order_at,
            'financial_status' => $order->financial_status,
            'total_price' => $order->total_price,
            'total_price_usd' => $order->total_price_usd,
            'subtotal_price' => $order->subtotal_price,
            'total_tax' => $order->total_tax,
            'taxes_included' => $order->taxes_included,
            'total_discounts' => $order->total_discounts,
            'total_line_items_price' => $order->total_line_items_price,
            'total_weight' => $order->total_weight,
            'total_tip_received' => $order->total_tip_received,
                //'billing_address' => $order->address,
            'currency' => $order->currency,
            'country_code' => $order->country_code,
            'customer_locale' => $order->customer_locale,
            'closed_at' => $order->close_at,
            'confirmed' => $order->confirmed,
            'discount_codes' => $order->discount_codes,
            'payment_gateway_names' => $order->payment_gateway_names,
            'phone' => $order->phone,
            'presentment_currency' => $order->presentment_currency,
            'processed_at' => $order->process_at,
            'processing_method' => $order->processing_method,
            'reference' => $order->reference,
            'referring_site' => $order->referring_site,
            'source_identifier' => $order->source_identifier,
            'source_name' => $order->source_name,
            'source_url' => $order->source_url,
            'tags' => $order->tags,
            'note' => $order->note,
            'name' =>  $order->name,
            'email' => $order->email,
            'fulfillment_status' => $order->fulfillment_status,
            'landing_site' => $order->landing_site,
            'landing_site_ref' => $order->landing_site_ref,
            'number' => $order->number,
            'order_number' => $order->order_number,
            'order_status_url' => $order->order_status_url,
            'customer_id' => $order->customer_id,
            'line_items'  => $order->line_item_id,
            ];

        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/orders/update', $order);   
        if ($response->successful()) {
            Log::info('Successfully Updating Order With ID : '. ' Has been updated.' .json_encode($order));
        } else {
            Log::error('Error Updating Order With ID :'.'In Converted.in');
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
    $response = Http::withHeaders([
        'x-shop-domain' => ('env.Store_Domain'),
        'token' => config('app.API_TOKEN'),
        'Content-Type' => 'application/json'
    ])->post('https://app.converted.in/api/webhooks/api/orders/delete', $order); // Use DELETE request

    if ($response->successful()) {
        Log::info("Order with ID has been successfully deleted from Converted.in.");
    } else {
        Log::error("Failed to delete order with IDfrom Converted.in: " . $response);
    }
    }


    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
