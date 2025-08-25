<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;



class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'is_read'
        
    ];

    public function sender()
    {
        return $this->belongsTo(\App\Models\JoinWeb::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(\App\Models\JoinWeb::class, 'receiver_id');
    }
}
