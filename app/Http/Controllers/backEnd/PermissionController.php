<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Permission;
use Auth;
class PermissionController extends Controller
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
            $permissions= Permission::all();
            return view('backEnd.permission.index',compact('permissions'));
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
            return view('backEnd.permission.create',compact('permissions'));
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
        $this->validate($request,['name'=>'unique:permissions|required|max:50','for'  => 'required']) ;
        $permissions= $request->all();
        Permission::create($permissions);

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Insert Success!</strong>.
                                            </div>');

        return redirect()->route('permission.create');
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
        if (Auth::user()->can('posts.user')) {
            $permission= Permission::findOrFail($id);
            return view('backEnd.permission.edit',compact('permission'));
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
        $permission= Permission::findOrFail($id);

        $this->validate($request,['name'=>'required|max:50|min:3|unique:permissions,name,'.$permission->id]);

        $permissions=$request->all();
        $permission->update($permissions);

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->can('posts.user')) {
            $permission=Permission::findOrFail($id);
            
            $permission->delete();

            $request->session()->flash('message','<div class="alert alert-danger">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>delete Success!</strong>.
                                                </div>');

            return redirect()->Route('permission.index');
        }
        return redirect()->route('admin.dashboard');
    }
    
}
