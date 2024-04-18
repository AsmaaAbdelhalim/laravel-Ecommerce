<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\StoreInfo;
use App\Observers\CategoryObserver;
use App\Observers\CustomerObserver;
use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
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
        Product::observe(ProductObserver::class);
        Order::observe(OrderObserver::class);
        Customer::observe(CustomerObserver::class);
        Category::observe(CategoryObserver::class);

    }
}
