<?php

namespace App\Http\Controllers;

use App\designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
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
        $designation = DB::table('designations')->Paginate(10);
        return View('admin.designation.manage_designation', compact('designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return View('admin.designation.add_designation');
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
            
            'input_designation' => 'required',
            'input_description' => 'required'
        ]);

         // save the data 

         $save = new designation;
         $save -> input_designation = request()->input('input_designation');
         $save -> input_description = request()->input('input_description');
         $save -> save();

         return redirect('/manage_designation')->with('success', 'Designation created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = designation::findOrFail($id);
        return view('admin.designation.edit_designation', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request, [
            
            'input_designation' => 'required',
            'input_description' => 'required'
        ]);

        // save the data 

        $save =  designation::findorfail($id);
        $save -> input_designation = request()->input('input_designation');
        $save -> input_description = request()->input('input_description');
        $save -> save();

        return redirect('/manage_designation')->with('success', 'Designation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = designation::findorfail($id)->delete();

        return redirect('/manage_designation')->with('success', 'Designation Deleted successfully');
    }
}
