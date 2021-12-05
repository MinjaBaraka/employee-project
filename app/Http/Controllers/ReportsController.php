<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
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

    public function report()
    {
        $leave = DB::table('leaves')->count();
        $pending = DB::table('apply_leaves')->where('status', '=', '0')->count();
        $approved = DB::table('apply_leaves')->where('status', '=', '1')->count();
        $not_approved = DB::table('apply_leaves')->where('status', '=', '2')->count();

        return View('admin.report.report', compact('leave', 'pending', 'approved', 'not_approved'));
    }
}
