<?php

namespace App\Http\Controllers;

use App\adduser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdduserController extends Controller
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

        $adduser = DB::table('addusers')->Paginate(10);
        // dd($employee);
        return View('admin.user.manage_user', compact('adduser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.user.add_user');
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
            
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'user_catergory' => 'required',
            'status' => 'required',
        ]);

        // save data

         $save = new adduser;
         $save -> first_name = request()->input('first_name');
         $save -> last_name = request()->input('last_name');
         $save -> contact = request()->input('contact');
         $save -> email = request()->input('email');
         $save -> username = request()->input('username');
         $save -> password = request()->input('password');
         $save -> user_catergory = request()->input('user_catergory');
         $save -> status = request()->input('status');
         $save -> save();

         return redirect('/manage_user')->with('success', 'User created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function status_update($id)
    {
        // dd("here");
        $user = DB::table('addusers')
            ->where('id', '=', $id)->first();

            // Check User status 
            if ($user->status == '1'){
                $status = '0';
            }else{
                $status = '1';
            }
        // dd($user->id);

            $values = array('status' => $status);
            DB::table('addusers')->where('id', $id)->update($values);
            
            return redirect('/manage_user')->with('success', 'User Status Update successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function edit(adduser $adduser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adduser $adduser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = adduser::findorfail($id)->delete();

        return redirect('/manage_user')->with('success', 'Designation Deleted successfully');
    }
}
