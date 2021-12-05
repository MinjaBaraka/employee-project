<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    protected $fillable = [
        'input_designation', 'input_description',
    ];
}
