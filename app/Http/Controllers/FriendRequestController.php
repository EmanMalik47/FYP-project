<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Notifications\FriendRequestNotification;


class FriendRequestController extends Controller
{
   public function sendRequest($receiverId)
{
    $senderId = Auth::id();

    // Prevent sending to self
    if ($senderId == $receiverId) {
        return response()->json(['message' => 'You cannot send a request to yourself.'], 400);
    }

    // Check if request already exists
    $existing = FriendRequest::where('sender_id', $senderId)
        ->where('receiver_id', $receiverId)
        ->first();

    if ($existing) {
        return response()->json(['message' => 'Friend request already sent.'], 200);
    }

    // Create the request
    FriendRequest::create([
        'sender_id' => $senderId,
        'receiver_id' => $receiverId,
        'status' => 'pending',
    ]);

     // Send notification to the receiver
    $receiver = User::find($receiverId);
    $sender = Auth::user();
    $receiver->notify(new FriendRequestNotification(
        "{$sender->name} sent you a friend request.",
        route('friend.requests') // update to your correct route if needed
    ));

      // 3. Notify Admin
    $admin = User::where('is_admin', true)->first(); // adjust if multiple admins
    if ($admin) {
        $admin->notify(new FriendRequestNotification(
            "New friend request sent by {$sender->name}",
            route('admin.dashboard.exchangeRequest') // Admin-side route to review
        ));
    }


    return response()->json(['message' => 'Friend request sent!'], 200);
}



}