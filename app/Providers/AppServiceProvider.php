<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Http\Controllers\CartController;

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
    public function boot()
    {
        Event::listen('Illuminate\Auth\Events\Login', function () {
            $cartController = new CartController();
            $cartController->loadCartFromDatabase();
        });

        Event::listen('Illuminate\Auth\Events\Logout', function () {
            $cartController = new CartController();
            $cartController->saveCartToDatabase();
        });
    }
}
