<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyLeave extends Model
{
    protected $fillable = [
        'leave_number', 'select_leave_type', 'from_date',
        'to_date', 
    ];

}
