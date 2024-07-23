<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\User;
use Braintree\Gateway;

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
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway([
                    'environment' => 'sandbox',
                    // env('BRAINTREE_ENV'),
                    'merchantId' => 'k73tdffmd2q39mzm',
                    // env('BRAINTREE_MERCHANT_ID'),
                    'publicKey' => 'yhpsscxqmz6crgkq',
                    // env('BRAINTREE_PUBLIC_KEY'),
                    'privateKey' => '5b88ab738023e27bff65601e1893cc4a',
                    // env('BRAINTREE_PRIVATE_KEY'),
                ],
            );
        });
        $this->registerPolicies();

        Gate::define('view-dishes', function (User $user, Dish $dish) {
            return $user->id === $dish->restaurant->user_id;
        });

        Gate::define('view-restaurants', function (User $user, Restaurant $restaurant) {
            return $user->id === $restaurant->user_id;
        });

        Paginator::useBootstrapFive();
    }
}
