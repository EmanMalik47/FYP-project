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
      public function index($id) // $id = other user id (receiver)
    {
        $authId = Auth::id();
        
        // ensure receiver exists
        $receiver = JoinWeb::find($id);
        $authUser = JoinWeb::find($authId);

        $friends = $authUser ? $authUser->friends() : collect();
        //  $friends = JoinWeb::where('id', '!=', $authId)->get();
        
        // load conversation between auth user and receiver
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
        // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $senderId = Auth::id();
    $receiverId = $request->receiver_id;

   
    $message = new Message();
    $message->sender_id = $senderId;
    $message->receiver_id = $receiverId;
    $message->message = $request->message;

    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $imageName = time() . '_' . $image->getClientOriginalName();

    //     $image->move(public_path('images/chat_images'), $imageName);

    //     $message->image = 'images/chat_images/' . $imageName;
    // }

    $message->save();

    
    $message->load('sender');
    event(new MessageSent($message));

    return response()->json([
        'status' => 'Message Sent',
        'message' => [
            'id' => $message->id,
            'sender_id' => $message->sender_id,
            'sender_name' => $message->sender->name ?? 'You',
            'message' => $message->message,
            // 'image' => $message->image ? asset($message->image) : null,
            'created_at' => $message->created_at->toDateTimeString(),
        ]
    ], 200);
    
    }
}
