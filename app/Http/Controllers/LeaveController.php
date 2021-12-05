<?php

namespace App\Http\Controllers;

use App\leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
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

    public function index()
    {
        $leave = DB::table('leaves')->Paginate(10);
        // dd($leave);
        return View('admin.leave.manage_leave_type', compact('leave'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.leave.add_leave_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('kaka');
        $this-> validate($request, [
            
            'leave_name' => 'required',
            'description' => 'required',
            'days_allowed' => 'required'
        ]);


        // save data

         $save = new leave;
         $save -> leave_name = request()->input('leave_name');
        //  dd($request -> leave_name);
         $save -> description = request()->input('description');
         $save -> days_allowed = request()->input('days_allowed');
         $save -> save();

         return redirect('/manage_leave_type')->with('success', 'Leave created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = leave::findOrFail($id);
        return view('admin.leave.edit_leave_type', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request, [
            'leave_name' => 'required',
            'description' => 'required',
            'days_allowed' => 'required',
        ]);

        // save data

         $save =  leave::findorfail($id);
         $save -> leave_name = request()->input('leave_name');
         $save -> description = request()->input('description');
         $save -> days_allowed = request()->input('days_allowed');
         $save -> save();

         return redirect('/manage_leave_type')->with('success', 'Leave created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = leave::findorfail($id)->delete();

        return redirect('/manage_leave_type')->with('success', 'Department Deleted successfully');
    }
}
