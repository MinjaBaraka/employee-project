<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    protected $fillable = [
        'leave_name', 'description', 'days_allowed',
    ];
}
