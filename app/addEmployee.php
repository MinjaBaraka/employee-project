<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addEmployee extends Model
{
    protected $fillable = [
        'id_number', 'select_gender','first_name','middle_name','last_name','age',
        'email','contact','file','select_department','select_designation','username',
        'passsword','status',
    ];
}
