<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    protected $fillable = [
        'department_short_name', 'department_name',
    ];
}
