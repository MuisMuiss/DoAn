<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            if (Auth::check()) {
                // Đã đăng nhập: Đếm từ database
                $cartCount = Cart::where('nguoi_dung_id', Auth::id())->count();
            } else {
                // Chưa đăng nhập: Đếm từ session
                $cart = session()->get('cart', []); // Mặc định là mảng rỗng nếu chưa có session
                $cartCount = count($cart);
            }
    
            $view->with('cartCount', $cartCount);
        });

    }
    
}
