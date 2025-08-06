<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use  Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',          // image
        'skill_teach',
        'skill_learn',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    public function sentRequests()
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }

  
    public function receivedRequests()
    {
        return $this->hasMany(FriendRequest::class, 'receiver_id');
    }
}
