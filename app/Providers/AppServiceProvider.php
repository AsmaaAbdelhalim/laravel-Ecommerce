<?php

namespace App\Providers;

use App\Models\StoreInfo;
use App\Observers\StoreInfoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        StoreInfo::observe(StoreInfoObserver::class);
    }
}
