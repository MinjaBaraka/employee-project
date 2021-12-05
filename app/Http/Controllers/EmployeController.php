<?php

namespace App\Http\Controllers;

use App\employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
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
        $department = DB::table('employes')->Paginate(10);
        return View('admin.departments.manage_department', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.departments.add_department');
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
            
            'department_short_name' => 'required',
            'department_name' => 'required'
        ]);

         // save the data 

         $save = new employe;
         $save -> department_short_name = request()->input('department_short_name');
         $save -> department_name = request()->input('department_name');
         $save -> save();

         return redirect('/manage_department')->with('success', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = employe::findOrFail($id);
        return view('admin.departments.edit_department', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> validate($request, [
            
            'department_short_name' => 'required',
            'department_name' => 'required'
        ]);

        // save the data 

        $save =  employe::findorfail($id);
        $save -> department_short_name = request()->input('department_short_name');
        $save -> department_name = request()->input('department_name');
        $save -> save();

        return redirect('/manage_department')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = employe::findorfail($id)->delete();

        return redirect('/manage_department')->with('success', 'Department Deleted successfully');
    }
}
