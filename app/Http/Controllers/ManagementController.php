<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplyLeave;
use Illuminate\Support\Facades\DB;


class ManagementController extends Controller
{
    
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    // public  $employee=[];

    public function all_leave()
    {
        $all_leave = DB::table('apply_leaves')->Paginate(10);
        // $all = DB::table('apply_leaves')->select('status')->where('status', '=', 'pending');
        return View('admin.leave_management.all_laeve', compact('all_leave'));
    }

    public function pending_leave()
    {
        $pending_leave = DB::table('apply_leaves')->Paginate(10);
        $pending = DB::table('apply_leaves')->where('status', '=', '0')->Paginate(10);
        return View('admin.leave_management.pending_leave', compact('pending_leave', 'pending'));
    }   

    public function approve_leave()
    {
        $approve_leave = DB::table('apply_leaves')->Paginate(10);
        $approve = DB::table('apply_leaves')->where('status', '=', '1')->Paginate(10);
        return View('admin.leave_management.approve_leave', compact('approve_leave', 'approve'));
    }

    public function not_approve_leave()
    {
        $not_approve_leave = DB::table('apply_leaves')->Paginate(10);
        $not_approve = DB::table('apply_leaves')->where('status', '=', '2')->Paginate(10);
        return View('admin.leave_management.not_approve_leave', compact('not_approve_leave', 'not_approve'));
    }

}
