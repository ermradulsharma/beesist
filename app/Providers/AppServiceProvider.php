<?php

namespace App\Providers;

use App\Domains\Auth\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Subscription;
use Laravel\Cashier\SubscriptionItem;
use Schema;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Cashier::useCustomerModel(User::class);
        // Cashier::useSubscriptionModel(Subscription::class);
        // Cashier::useSubscriptionItemModel(SubscriptionItem::class);

        Blade::if('readonly', function () {
            return config('lockout.enabled');
        });
    }
}
