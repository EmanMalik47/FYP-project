<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\JoinWeb;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\FriendRequestNotification;
use App\Notifications\AdminNotification;

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

        FriendRequest::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'status' => 'pending',
        ]);

        // Notify Receiver
        $receiver = JoinWeb::find($receiver_id);
        $receiver->notify(new FriendRequestNotification("You have a new friend request.", 'request', $sender_id));

        // Notify Admin
        $sender = JoinWeb::find($sender_id);
        $admin = Admin::first();
        if ($admin) {
            $admin->notify(new AdminNotification("User {$sender->id} Name: {$sender->fname} sent a friend request to User {$receiver->id} Name: {$receiver->fname}"));
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

            $friendRequest->sender->notify(new FriendRequestNotification("Your request has been accepted.", 'accepted', $friendRequest->receiver_id));
        } elseif ($action == 'reject') {
            $friendRequest->status = 'declined';
            $friendRequest->save();

            $friendRequest->sender->notify(new FriendRequestNotification("Your request has been rejected.", 'rejected', $friendRequest->receiver_id));
        }

        return response()->json(['message' => "Request {$action}ed successfully."], 200);
    }

    public function adminReject($request_id)
    {
        $friendRequest = FriendRequest::findOrFail($request_id);

        if ($friendRequest->status !== 'pending') {
            return response()->json(['message' => 'Request already handled.'], 400);
        }

        $friendRequest->status = 'declined';
        $friendRequest->save();

        $friendRequest->sender->notify(new FriendRequestNotification("Your request was rejected by the admin.", 'admin_rejected', $friendRequest->receiver_id));
        $friendRequest->receiver->notify(new FriendRequestNotification("This request was rejected by the admin.", 'admin_rejected', $friendRequest->sender_id));

        return response()->json(['message' => "Request rejected by admin."], 200);
    }

    public function viewRequest($sender_id)
    {
        $receiver_id = Auth::id();
        $friendRequest = FriendRequest::where('sender_id', $sender_id)
            ->where('receiver_id', $receiver_id)
            ->where('status', 'pending')
            ->firstOrFail();

        return view('request', compact('friendRequest'));
    }
}
