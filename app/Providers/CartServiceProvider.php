<?php

namespace App\Providers;

use App\Repositories\CartInterfaceRepository;
use App\Repositories\CartSessionRepository;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartInterfaceRepository::class, CartSessionRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
