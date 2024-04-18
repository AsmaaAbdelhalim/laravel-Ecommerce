<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/customers/create', $customer);
        if ($response->successful()) {
                Log::info('Successfully Creating Customer With ID :' . $customer->id . json_encode($customer));
            } else {
                Log::error('Error creating customer in Converted.in');
            }

    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/customers/update', $customer);
        if ($response->successful()) {
            Log::info('Successfully Updating Customer With ID :' . $customer->id . ' Has been updated.' .json_encode($customer));
        } else {
            Log::error('Error Updating Customer With ID :' . $customer->id .'In Converted.in');
        }
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        $response = Http::withHeaders([
            'x-shop-domain' => ('env.Store_Domain'),
            'token' => config('app.API_TOKEN'),
            'Content-Type' => 'application/json'
        ])->post('https://app.converted.in/api/webhooks/api/customers/delete', $customer);
        if ($response->successful()) {
            Log::warning('Deleting Customer with ID :' .$customer->id .'Has been deleted.');
        } else {
            Log::error('Failed to delete Customer with ID :' .$customer->id .'from Converted.in');
        }
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    { 
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
