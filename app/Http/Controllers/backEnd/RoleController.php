<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Role;
use App\Model\admin\Permission;
use Auth;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        if (Auth::user()->can('posts.user')) {
            $roles= Role::all();
            return view('backEnd.role.index',compact('roles'));
        }
        return redirect()->route('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.user')) {
            $permissions= Permission::all();
            return view('backEnd.role.create',compact('permissions'));
        }
        return redirect()->route('admin.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required|unique:roles,name|max:50']);
        $roles= $request->all();
        $role= Role::create($roles);
        $role->permissions()->sync($request->permission);
        

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Insert Success!</strong>.
                                            </div>');

        return redirect()->route('role.create');
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
    public function edit(Request $request,$id)
    {
        if (Auth::user()->can('posts.user')) {
            $role=Role::findOrFail($id);
            $permissions= Permission::all();
            return view('backEnd.role.edit',compact('role','permissions'));
        }
        return redirect()->route('admin.dashboard');
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
        $role= Role::findOrFail($id);
        $this->validate($request,['name'=>'required||max:50|unique:roles,name,'.$role->id]);
        $roles= $request->all();
        
        
        $role->update($roles);
         $role->permissions()->sync($request->permission);
         $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');

      return redirect()->Route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('posts.user')) {
             $role=Role::findOrFail($id);
            
            $role->delete();

            return redirect()->Route('role.index');
        }
        return redirect()->route('admin.dashboard');
    }
}
