<?php

namespace App\Observers;

use App\Models\StoreInfo;
use App\Events\StoreInfoEvent;
use Illuminate\Support\Facades\Log;

class StoreInfoObserver
{
    /**
     * Handle the StoreInfo "created" event.
     */
    public function created(StoreInfo $storeInfo): void
    {
        Log::info('Creating observer:'.json_encode($storeInfo));
    }

    /**
     * Handle the StoreInfo "updated" event.
     */
    public function updated(StoreInfo $storeInfo): void
    {
        //
    }

    /**
     * Handle the StoreInfo "deleted" event.
     */
    public function deleted(StoreInfo $storeInfo): void
    {
        //
    }

    /**
     * Handle the StoreInfo "restored" event.
     */
    public function restored(StoreInfo $storeInfo): void
    {
        //
    }

    /**
     * Handle the StoreInfo "force deleted" event.
     */
    public function forceDeleted(StoreInfo $storeInfo): void
    {
        //
    }
}
