<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    // List all notifications
    public function index()
    {
        $admin = auth('admin')->user();

        // Mark all unread notifications as read
        $admin->unreadNotifications->markAsRead();

        // Fetch all notifications
        $notifications = $admin->notifications()->latest()->get();

        return view('admin.notifications.index', compact('notifications'));
    }

    // Show single notification detail
    public function show($id)
    {
        $admin = auth('admin')->user();

        $notification = $admin->notifications()->findOrFail($id);

        // Mark as read if unread
        if (is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return view('admin.notifications.show', compact('notification'));
    }
}
