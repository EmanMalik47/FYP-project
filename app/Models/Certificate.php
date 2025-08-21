<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model

{
    protected $fillable = [
        'user_id',
        'user_name',
        'skill',
        'downloaded_at',
    ];

    public function user()
    {
        return $this->belongsTo(JoinWeb::class, 'user_id');
    }
}

