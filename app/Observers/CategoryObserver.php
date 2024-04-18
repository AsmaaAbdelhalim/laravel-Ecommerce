<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use  Illuminate\Support\Facades\Config;


class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/collections/create', $category);
        if ($response->successful()) {
            Log::info('Successfully Creating Category With ID :' . $category->id . json_encode($category));
        } else {
            Log::error('Error creating Category in Converted.in');
        }
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {

        
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/collections/update', $category);
        if ($response->successful()) {
            Log::info('Successfully Updating Category With ID :' . $category->id . ' Has been updated.' .json_encode($category));
        } else {
            Log::error('Error Updating Category With ID :' . $category->id .'In Converted.in');
        }
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/collections/delete', $category);
        if ($response->successful()) {
            Log::warning('Deleting Category with ID :' .$category->id .'Has been deleted.');
        } else {
            Log::error('Failed to delete Category with ID :' .$category->id .'from Converted.in');
        }
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}
