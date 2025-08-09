<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read($id)
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        // Try to find in unread first (collection), else check all notifications
        $notification = $user->unreadNotifications->where('id', $id)->first();

        if (! $notification) {
            $notification = $user->notifications->where('id', $id)->first();
        }

        if (! $notification) {
            return redirect()->back(); // or redirect('/')
        }

        // Safely get url from data, fallback to home
        $url = data_get($notification->data, 'url', url('/'));

        // mark as read
        $notification->markAsRead();

        // redirect to the url
        return redirect($url);
    }
}
