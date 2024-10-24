<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

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
            $wishlistController = new WishlistController();
            
            // Load both cart and wishlist on login
            $cartController->loadCartFromDatabase();
            $wishlistController->loadWishlistFromDatabase();
        });

        Event::listen('Illuminate\Auth\Events\Logout', function () {
            $cartController = new CartController();
            $wishlistController = new WishlistController();
            
            // Save both cart and wishlist on logout
            $cartController->saveCartToDatabase();
            $wishlistController->saveWishlistToDatabase();
        });
    }
}
