<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Dish;
use App\Models\Order;
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
                    'environment' => env('BRAINTREE_ENV'),
                    'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                    'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                    'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
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

        Gate::define('view-orders', function ($user, $order) {
            
            $dishes = $order->dishes;

            foreach ($dishes as $dish) {
                $restaurantUserId = $dish->restaurant->user_id;

                if ($user->id === $restaurantUserId) {
                    return true;
                }
            }

            return false;
        });

        Paginator::useBootstrapFive();
    }
}
