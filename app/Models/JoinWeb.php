<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class JoinWeb extends Authenticatable
{
    use Notifiable; // 👈 This fixes the notify() error

    protected $table = 'join_webs';

    protected $fillable = [
        'name', 'lastname', 'email', 'phone', 'password',
        'sellist1', 'sellist2', 'facilities', 'about', 'profile', 'pdf'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
