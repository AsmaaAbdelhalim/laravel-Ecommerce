<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use  Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
    // $response = Http::withHeaders([
    //     'x-shop-domain' => ('env.Store_Domain'),
    //     'token' => Config::get('app.API_TOKEN'),
    //     'Content-Type' => 'application/json'
    // ])->post('https://app.converted.in/api/webhooks/api/products/create', 
    // [
    //     'id' => $product->id,
    //     'title'=> $product->title,
    //     'full_permalink' => $product->full_permalink,
    //     'category_id' => $product->category_id,
    //     'handle' => $product->handle,
    //     'image' => $product->image,
    //     'content' => $product->content,
    //     'vendor' => $product->vendor,
    //     'price' => $product->price,
    //     'compare_at_price' => $product->compare_at_price,
    //     'published_at' => $product->publish_at,
    //     'images' => $product->images_id,
    //     'meta' => $product->meta,
    //     'tags' => $product->tags,
    //     'quantity' => $product->quantity,
    // ]);
 
    $product = [
        'id' => $product->id,
        'title' => $product->title,
        'full_permalink' => $product->full_permalink,
        'category_id' => $product->category_id,
        'handle' => $product->handle,
        'image' => $product->image,
        'content' => $product->content,
        'vendor' => $product->vendor,
        'price' => $product->price,
        'compare_at_price' => $product->compare_at_price,
        'published_at' => $product->publish_at,
        'images' => $product->images_id,
        'meta' => $product->meta,
        'tags' => $product->tags,
        'quantity' => $product->quantity,
    ];
    $response = Http::withHeaders([
        'x-shop-domain' => ('env.Store_Domain'),
        'token' => config('app.API_TOKEN'),
        'Content-Type' => 'application/json'
    ])->post('https://app.converted.in/api/webhooks/api/products/create', $product);

    if ($response->successful()) {
        Log::info('Successfully Creating Product :'.json_encode($product));
    }else{
        Log::error('Error in creating product:');
    }
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/products/update', $product);
        if ($response->successful()){
        Log::info('Successfully Updating Product with ID ' . $product->id . ' has been updated.' .json_encode($product));
        } else {
        Log::Error('Failed to Update Product with id:' .  $product->id . $response);
    }
    }
    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    { 
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/products/delete', $product); // Use DELETE request
    
        if ($response->successful()) {
            Log::info("Product with ID $product->id has been successfully deleted from Converted.in.");
        } else {
            Log::error("Failed to delete product with ID $product->id from Converted.in: " . $response);
        }
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }

}
