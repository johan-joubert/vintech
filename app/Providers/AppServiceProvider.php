<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
<<<<<<< HEAD
    /* Register any application services.
     *
     * @return void
     */
=======

>>>>>>> fe610af564302cbe6c403ad2500cbc84d91a2609
    public function register()
    {
        //
    }

<<<<<<< HEAD
    /* Bootstrap any application services.
     *
     * @return void
     */
=======
>>>>>>> fe610af564302cbe6c403ad2500cbc84d91a2609
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}