<?php

namespace App\Http\Controllers;
use App\Models\FriendRequest; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\User; 


class FriendRequestController extends Controller
{
    public function sendRequest(Request $request, $receiver_id)
{
    $senderId = Auth::id();
    // $receiverId = $request->input('receiver_id');

    // Prevent sending request to self
    if ($senderId == $receiver_id) {
        return back()->with('error', 'You cannot send a friend request to yourself.');
    }

    // Check if request already exists
    $exists = FriendRequest::where('sender_id', $senderId)
        ->where('receiver_id', $receiver_id)
        ->first();

    if ($exists) {
        return back()->with('error', 'Friend request already sent.');
    }

    // Create the friend request
    FriendRequest::create([
        'sender_id' => $senderId,
        'receiver_id' => $receiver_id,
        'status' => 'pending',
    ]);

    return back()->with('success', 'Friend request sent successfully!');
}

}
