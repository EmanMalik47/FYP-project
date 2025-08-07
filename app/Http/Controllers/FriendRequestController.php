<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\JoinWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\FriendRequestNotification;

class FriendRequestController extends Controller
{
    public function sendRequest($receiver_id)
    {
        $sender_id = Auth::id();

        // Prevent sending to self
        if ($sender_id == $receiver_id) {
            return response()->json(['message' => 'You cannot send a request to yourself.'], 400);
        }

        // Check if request already exists
        $existing = FriendRequest::where('sender_id', $sender_id)
            ->where('receiver_id', $receiver_id)
            ->first();

        if ($existing) {
            return response()->json(['message' => 'Friend request already sent.'], 200);
        }

       
        // $receiver = JoinWeb::find($receiver_id);
        // if (!$receiver) {
        //     return response()->json(['message' => 'Receiver user not found.'], 404);
        // }

        // Create the request
        FriendRequest::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'status' => 'pending',
        ]);

        // Send notification to the receiver
        // $sender = Auth::user();
        // $receiver->notify(new FriendRequestNotification($sender, 'request'));

        // Optional: Notify Admin (if admin exists)
        // $admin = User::where('is_admin', true)->first();
        // if ($admin) {
        //     $admin->notify(new FriendRequestNotification($sender, 'request'));
        // }

        return response()->json(['message' => 'Friend request sent successfully!'], 200);
    }
}
