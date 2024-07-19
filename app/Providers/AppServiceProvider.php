<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\User;

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
