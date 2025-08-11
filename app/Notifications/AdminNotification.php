<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @param string $message The notification message to store
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * The channels the notification will be sent on.
     */
    public function via($notifiable)
    {
        return ['database']; // Store in database
    }

    /**
     * Data stored in the database notifications table.
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message
        ];
    }
}
