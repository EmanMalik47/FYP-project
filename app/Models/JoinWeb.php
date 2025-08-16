<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class JoinWeb extends Authenticatable
{
    use Notifiable;

    protected $table = 'join_webs';

    protected $fillable = [
        'name', 'lastname', 'email', 'phone', 'password',
        'sellist1', 'sellist2', 'facilities', 'about', 'profile', 'pdf'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Friends jahan current user ne request bheji aur accept ho gayi
     */
    public function friendsOfMine()
    {
        return $this->belongsToMany(
            JoinWeb::class,
            'friend_requests',
            'sender_id',
            'receiver_id'
        )->wherePivot('status', 'accepted');
    }

    /**
     * Friends jahan current user ne request receive ki aur accept kar li
     */
    public function friendOf()
    {
        return $this->belongsToMany(
            JoinWeb::class,
            'friend_requests',
            'receiver_id',
            'sender_id'
        )->wherePivot('status', 'accepted');
    }

  
  public function friends()
{
    return $this->friendsOfMine()->get()->merge($this->friendOf()->get());
}

}
