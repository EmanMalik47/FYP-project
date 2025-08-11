<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
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
   public function boot()
{
    View::composer('*', function ($view) {
        if (auth('admin')->check()) {
            $unreadCount = auth('admin')->user()->unreadNotifications()->count();
            $view->with('unreadCount', $unreadCount);
        } else {
            $view->with('unreadCount', 0);
        }
    });
}
}
