<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRequest extends Model
{
     protected $fillable = [
        'sender_id',
        'receiver_id',
        'offered_skill',
        'requested_skill',
        'status',
    ];
}
