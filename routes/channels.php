<?php

use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
//     return (int) $user->id === (int) $receiverId;
// });
Broadcast::channel('chat.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id; // sirf wohi user apna chat.{id} sun sake
});