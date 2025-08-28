<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\JoinWeb;
use App\Models\Admin;
use App\Models\Friend;
use App\Models\ExchangeRequest;

use App\Notifications\AdminNotification;
use App\Notifications\FriendRequestNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;

class FriendRequestController extends Controller
{
  
public function sendRequest($receiver_id)
{
    $sender_id = Auth::id();

    if ($sender_id == $receiver_id) {
        return response()->json(['message' => 'You cannot send a request to yourself.'], 400);
    }

    $existing = FriendRequest::where('sender_id', $sender_id)
        ->where('receiver_id', $receiver_id)
        ->where('status', 'pending')
        ->first();

    if ($existing) {
        return response()->json(['message' => 'Friend request already sent.'], 200);
    }

    $friendRequest = FriendRequest::create([
        'sender_id' => $sender_id,
        'receiver_id' => $receiver_id,
        'status' => 'pending',
    ]);

    $receiver = JoinWeb::find($receiver_id);
    if ($receiver) {
        $receiver->notify(new FriendRequestNotification(
            "You have a new friend request.",
            'request',
            $sender_id,
            $friendRequest->id
        ));
    }

    
    $sender = JoinWeb::find($sender_id);
    $admin = Admin::first();
    if ($admin && $sender && $receiver) {
$admin->notify(new AdminNotification("User {$sender->name} having id: {$sender->id} sent a friend request to User {$receiver->name} having id:{$receiver->id}", $friendRequest->id));

    }

    return response()->json(['message' => 'Friend request sent successfully!'], 200);
}


  public function respondRequest($request_id, $action)
{
    $friendRequest = FriendRequest::findOrFail($request_id);

    if ($friendRequest->status !== 'pending') {
        return response()->json(['message' => 'Request already handled.'], 400);
    }

    if ($action == 'accept') {
       
        $friendRequest->status = 'accepted';
        $friendRequest->save();

        
        Friend::create([
            'user_id'   => $friendRequest->sender_id,
            'friend_id' => $friendRequest->receiver_id
        ]);

        Friend::create([
            'user_id'   => $friendRequest->receiver_id,
            'friend_id' => $friendRequest->sender_id
        ]);

        
        ExchangeRequest::create([
            'sender_id'       => $friendRequest->sender_id,
            'receiver_id'     => $friendRequest->receiver_id,
            'offered_skill'   => $friendRequest->sender->sellist1 ?? 'N/A',
            'requested_skill' => $friendRequest->receiver->sellist2 ?? 'N/A',
            'status'          => 'accepted',
        ]);

        $receiverName = Auth::user()->name;
        $friendRequest->sender->notify(
            new FriendRequestNotification(
                "Your request has been accepted by {$receiverName}.",
                'accepted',
                $friendRequest->receiver_id
            )
        );

        return response()->json([
            'status'       => 'success',
            'message'      => "Congratulations! You and {$friendRequest->sender->name} are now friends.",
            'friend_id'    => $friendRequest->sender_id,
            'friend_name'  => $friendRequest->sender->name,
            'redirect_url' => route('user.profile', $friendRequest->sender_id)
        ]);

    } elseif ($action == 'reject') {
        $friendRequest->status = 'declined';
        $friendRequest->save();

        \App\Models\ExchangeRequest::create([
            'sender_id'       => $friendRequest->sender_id,
            'receiver_id'     => $friendRequest->receiver_id,
            'offered_skill'   => $friendRequest->sender->sellist1 ?? 'N/A',
            'requested_skill' => $friendRequest->receiver->sellist2 ?? 'N/A',
            'status'          => 'rejected',
        ]);

        return response()->json([
            'status'  => 'rejected',
            'message' => 'Request rejected successfully.'
        ]);
    }

    return response()->json(['message' => "Invalid action."], 400);
}



public function viewRequest()
{
    Auth::user()->unreadNotifications->markAsRead();

    $receiver_id = Auth::id();
    $friendRequests = FriendRequest::where('receiver_id', $receiver_id)
        ->where('status', 'pending')
        ->with('sender')
        ->get();

    return view('request', compact('friendRequests'));
}


}