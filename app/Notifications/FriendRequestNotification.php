<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

class FriendRequestNotification extends Notification
{
    use Queueable;

    public $message;
    public $type;
    public $sender_id;
    public $friendRequestId;

    public function __construct($message, $type, $sender_id, $friendRequestId = null)
    {
        $this->message = $message;
        $this->type = $type;
        $this->sender_id = $sender_id;
        $this->friendRequestId = $friendRequestId;
    }

    public function via($notifiable)
    {
        return ['database']; // database channel
    }

    public function toDatabase($notifiable)
    {
        // Build a URL for the receiver to view the request (change route name if needed)
        $url = route('friend.requests.show', $this->sender_id);

        return [
            'message' => $this->message,
            'type' => $this->type,
            'sender_id' => $this->sender_id,
            'url' => $url,
            'friend_request_id' => $this->friendRequestId,
        ];
    }
}
