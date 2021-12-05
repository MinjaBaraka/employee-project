<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adduser extends Model
{
    protected $fillable = [
        'full_name', 'contact',
        'email', 'username',
        'password', 'user_catergory',
        'status', 
    ];
}
