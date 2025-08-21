<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;


class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

     public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

   
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->message->receiver_id);
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->message->id,
            'sender_id' => $this->message->sender_id,
            'sender_name' => $this->message->sender->name ?? 'User',
            'message' => $this->message->message,
            'created_at' => $this->message->created_at->toDateTimeString(),
        ];
    }
    public function broadcastAs()
    {
        return 'MessageSent';
    }

}
