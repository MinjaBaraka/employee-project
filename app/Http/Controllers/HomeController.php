<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
            $addemployee = DB::table('add_employees')->count();
            $leave = DB::table('leaves')->count();
            $pending = DB::table('apply_leaves')->where('status', '=', '0')->count();
            $approved = DB::table('apply_leaves')->where('status', '=', '1')->count();
            $not_approved = DB::table('apply_leaves')->where('status', '=', '2')->count();
     
        return view('admin.index', compact('addemployee', 'leave', 'approved', 'pending', 'not_approved'));
    }
}
