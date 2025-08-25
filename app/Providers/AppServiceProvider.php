<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinWeb;
use App\Models\Message;
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
        $friends = collect();

        if (Auth::check()) {
            $authUser = JoinWeb::find(Auth::id());

            if ($authUser) {
                // apne friends lo
                $friends = $authUser->friends();

                // har friend ke liye unread messages count add karo
                $friends->map(function ($friend) use ($authUser) {
                    $friend->unread_count = Message::where('sender_id', $friend->id)
                        ->where('receiver_id', $authUser->id)
                        ->where('is_read', false)
                        ->count();
                    return $friend;
                });
            }
        }

        $view->with('friends', $friends);
    });
    // View::composer('*', function ($view) {
    //     if (auth('admin')->check()) {
    //         $unreadCount = auth('admin')->user()->unreadNotifications()->count();
    //         $view->with('unreadCount', $unreadCount);
    //     } else {
    //         $view->with('unreadCount', 0);
    //     }
    // });
}
}
