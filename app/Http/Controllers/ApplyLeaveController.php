<?php

namespace App\Http\Controllers;

use App\ApplyLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apply_leaves = DB::table('apply_leaves')->Paginate(10);
       
        // dd($apply_leaves);
        return view('norm.apply.leave_status', compact('apply_leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('norm.apply.apply_leave');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request, [
            
            'leave_number' => 'required',
            'select_leave_type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        
        // dd("test");   
        // save data

         $save = new ApplyLeave;
         $save -> leave_number = request()->input('leave_number');
         $save -> select_leave_type = request()->input('select_leave_type');
         $save -> from_date = request()->input('from_date');
         $save -> to_date = request()->input('to_date');
         $save -> save();

         return redirect('/leave_status')->with('success', 'Appy Leave created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApplyLeave  $applyLeave
     * @return \Illuminate\Http\Response
     */
    public function update_status($id,$status)
    {
        $applyLeave = ApplyLeave::
                        where('id', '=', $id)->first();

                        // dd($applyLeave);

        // Check the status

        // if ($applyLeave -> status === '0'){
        //     $status = '1';
        // }elseif($applyLeave -> status === '1'){
        //     $status = '0';
        // }else{
        //     $status = '2';
        // }

        // $values = array('status' => $status);
        // dd($values);
        $applyLeave->status = $status;
        $applyLeave->save();
        
        // DB::table('apply_leaves')->where('id', $id)->update($values);
        // dd($applyLeave->status." ".$status);
        
        return redirect('/all_leave')->with('success', 'Apply Leaves Status Update successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplyLeave  $applyLeave
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplyLeave $applyLeave)
    {
         //    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplyLeave  $applyLeave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplyLeave $applyLeave)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplyLeave  $applyLeave
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplyLeave $applyLeave)
    {
        //
    }
}
