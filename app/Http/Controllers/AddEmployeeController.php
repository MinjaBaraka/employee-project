<?php

namespace App\Http\Controllers;

use App\addEmployee;
use App\employe;
use App\designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AddEmployeeController extends Controller
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

    public function index()
    {

        $employee = DB::table('employes')->Paginate(10);
        // dd($employee);
        return View('admin.employee.manage_employee', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = employe::all();
        $designation = designation::all();
        return view('admin.employee.add_employee', compact('employees', 'designation'));
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
            
            'employee_number' => 'required',
            'select_gender' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'select_department' => 'required',
            'select_designation' => 'required',
            'username' => 'required',
            'passsword' => 'required'
        ]);

        
        $file = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $file);
         // save the data 

         $save = new addEmployee;
         $save -> employee_number = request()->input('employee_number');
         $save -> select_gender = request()->input('select_gender');
         $save -> first_name = request()->input('first_name');
         $save -> middle_name = request()->input('middle_name');
         $save -> last_name = request()->input('last_name');
         $save -> age = request()->input('age');

         $save -> email = request()->input('email');
         $save -> contact = request()->input('contact');
         $save -> file = $file;
         $save -> select_department = request()->input('select_department');
         $save -> select_designation = request()->input('select_designation');
         $save -> username = request()->input('username');

         $save -> password = request()->input('password');
        // $password = Hash::make($password);
         $save -> save();

         return redirect('/manage_employee')->with('success', 'Designation created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\addEmployee  $addEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(addEmployee $addEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\addEmployee  $addEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(addEmployee $addEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\addEmployee  $addEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addEmployee $addEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\addEmployee  $addEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(addEmployee $addEmployee)
    {
        //
    }
}
