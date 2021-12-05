<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveDeatailsController extends Controller
{
    public function details(){
        return view('admin.leave_details.leave_details');
    }
}
