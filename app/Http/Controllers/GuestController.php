<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addEmployee;
use App\leave;
use App\ApplyLeave;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index() {

        // $addemployee = DB::table('add_employees')->count();
        $leave = DB::table('leaves')->count();
        $pending = DB::table('apply_leaves')->where('status', '=', '0')->count();
        $approved = DB::table('apply_leaves')->where('status', '=', '1')->count();
        $not_approved = DB::table('apply_leaves')->where('status', '=', '2')->count();

        return view('norm.index', compact('leave', 'approved', 'pending', 'not_approved'));
    }
}
