<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Admin;
use App\Model\admin\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users=Admin::all();
        return view('admin/users/users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles=Role::all();
        return view('admin/users/createuser',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100|email|unique:admins',
            'password'=>'required|string|min:4|max:20|confirmed',


        ]);
        $request['password']=bcrypt($request->password);
        $user=Admin::create($request->all());
        $user->roles()->sync($request->role);
            return redirect(route('users.index'))->with('message','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user=Admin::find($id);
        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100|email|',
            'password'=>'required|string|min:4|max:20|confirmed',
                ]);
    

            $request->status? :$request['status']=0;
            $user=Admin::find($id);

            $user->update($request->except('_token'));
            $user->roles()->sync($request->role);
            return redirect(route('users.index'))->with('message','Updated successfully');

            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Admin::find($id)->delete();
        return redirect(route('users.index'))->with('message','User Deleted successfully');
    }
}
