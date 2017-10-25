<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\Role;
use Image;
use File;
use Auth;
class UserController extends Controller
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
        $users= admin::all();
        return view('backEnd.user.index',compact('users'));
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
        $roles= Role::all();
        return view('backEnd.user.create',compact('roles'));
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
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
            'image'=>'image',
        ]);
        $request['password'] = bcrypt($request->password);

         $users= $request->all();
        if($request->file('image')){

        $image= $request->file('image');

        $filename= time().'-'.str_slug($users['name'],"-").'.'.$image->GetClientOriginalExtension();
       
        $image_thumb_path= public_path('images/user/'.$filename);

        $image_upload= Image::make($image->getRealPath())->save($image_thumb_path);

        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $image_upload->resize(160, 160, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image_thumb_path);

        $users['image']= $filename;  
       }
        

       
        $user= admin::create($users);
        $user->roles()->sync($request->role);

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Insert Success!</strong>.
                                            </div>');

        return redirect()->route('user.index');
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
        $user= admin::findOrFail($id);
        $roles= Role::all();
        return view('backEnd.user.edit',compact('user','roles'));
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
        $user= admin::findOrFail($id);
        $users= $request->all();
         $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
            'image'=>'image',
        ]);
        
         if($request->file('image')){

        $image= $request->file('image');

        $filename= time().'-'.str_slug($users['name'],"-").'.'.$image->GetClientOriginalExtension();
       
        $image_thumb_path= public_path('images/user/'.$filename);

        $image_upload= Image::make($image->getRealPath())->save($image_thumb_path);

        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $image_upload->resize(160, 160, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image_thumb_path);

        $users['image']= $filename;  

         if(File::exists(public_path('images/user/'.$user->image))){
                File::delete(public_path('images/user/'.$user->image));
            }
       }

         if($request->status != 1){
            $users['status']=0;
         }   
        $user->update($users);
        $user->roles()->sync($request->role);


        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');
        return redirect()->Route('user.index');
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
         $user=admin::findOrFail($id);
        
        $user->delete();

       
            if(File::exists(public_path('images/user/'.$user->image))){
                File::delete(public_path('images/user/'.$user->image));
            }

        $request->session()->flash('message','<div class="alert alert-danger">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Delete Success!</strong>.
                                            </div>');
        return redirect()->Route('user.index');
    }
    return redirect()->route('admin.dashboard');
}

}
