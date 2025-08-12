<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinWeb;

class ChatController extends Controller
{
      public function index($id) // $id = other user id (receiver)
    {
        $authId = auth()->id();
        
        // ensure receiver exists
         $receiver = JoinWeb::find($id);

        // load conversation between auth user and receiver
        $messages = Message::where(function($q) use ($authId, $id) {
                $q->where('sender_id', $authId)->where('receiver_id', $id);
            })->orWhere(function($q) use ($authId, $id) {
                $q->where('sender_id', $id)->where('receiver_id', $authId);
            })
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat', compact('receiver', 'messages'));
        
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|integer|exists:join_webs,id',
        ]);

        $senderId = auth()->id();
        $receiverId = $request->receiver_id;

        // create and save message
        $message = Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message' => $request->message,
        ]);

        // load sender relation for event data
        $message->load('sender');

        // Fire event (this will broadcast to receiver's private channel)
        event(new MessageSent($message));

        // Return JSON (we append sender message on client so sender sees instantly)
        return response()->json([
            'status' => 'Message Sent',
            'message' => [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'sender_name' => $message->sender->name ?? 'You',
                'message' => $message->message,
                'created_at' => $message->created_at->toDateTimeString(),
            ]
        ], 200);
    }
}
