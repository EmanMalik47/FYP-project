<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
   use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
    ];

    // Optional: define relationships if needed
    public function sender()
    {
        return $this->belongsTo(\App\Models\JoinWeb::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(\App\Models\JoinWeb::class, 'receiver_id');
    }
}
