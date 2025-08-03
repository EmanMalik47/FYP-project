<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;

class JoinWeb extends Authenticatable
{
        // Define table name if not plural of model
    protected $table = 'join_webs';

    // Allow mass assignment on these fields
   protected $fillable = [
    'name', 'lastname', 'email', 'phone', 'password',
    'sellist1', 'sellist2', 'facilities', 'about', 'profile', 'pdf'
];
    // Hide sensitive data from arrays
    protected $hidden = [
        'password',
        'remember_token',
    ];
}