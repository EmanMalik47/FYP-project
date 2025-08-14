<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


class NotificationController extends Controller
{
     public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
 // Redirect to friend request page
        return redirect()->route('friend.requests');
    }
}
