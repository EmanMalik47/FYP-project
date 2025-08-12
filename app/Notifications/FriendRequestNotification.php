<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

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
        return ['database']; 
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'type' => $this->type,
            'sender_id' => $this->sender_id,
            'friend_request_id' => $this->friendRequestId,
            'url' => route('friend.requests.show'),
        ];
    }
}