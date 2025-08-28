<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinWeb;
use App\Models\Friend;
class ChatController extends Controller
{
      public function index($id) 
    {
        $authId = Auth::id();
        
        
        $receiver = JoinWeb::find($id);
        $authUser = JoinWeb::find($authId);
        $friends = $authUser ? $authUser->friends() : collect();

        if ($receiver && $receiver->is_blocked) {
        return view('chat', [
            'receiver' => $receiver,
            'friends' => $friends,
            'messages' => collect(), // empty messages
            'blocked' => true
        ]);
    }
        // mark all messages from this friend as read
        Message::where('sender_id', $id)
        ->where('receiver_id', $authId)
        ->where('is_read', false)
        ->update(['is_read' => true]);

        
        
        $messages = Message::where(function($q) use ($authId, $id) {
                $q->where('sender_id', $authId)->where('receiver_id', $id);
            })->orWhere(function($q) use ($authId, $id) {
                $q->where('sender_id', $id)->where('receiver_id', $authId);
            })
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat', compact('receiver', 'messages', 'friends'));
        
    }

    public function sendMessage(Request $request)
    {
        //    dd($request->all());
        $request->validate([
        'receiver_id' => 'required|integer|exists:join_webs,id',
        'message' => 'nullable|string',
        
    ]);

    $senderId = Auth::id();
    $receiverId = $request->receiver_id;

    $message = Message::create([
        'sender_id' => $senderId,
        'receiver_id' => $receiverId,
        'message' => $request->message,
        'is_read' => false
    ]);
    
    $message->load('sender');
    event(new MessageSent($message));

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

    public function markCompleted(Request $request, $id)
{
    $user = Auth::user(); // current user
    $friend = JoinWeb::findOrFail($id); // other user

$join = JoinWeb::where('email', $user->email)->first();

if ($user->id < $friend->id) {
    $join->learner_completed = true;
} else {
    $join->teacher_completed = true;
}
$join->save();


    return back()->with('success', 'You marked this skill as completed.');
}

}
