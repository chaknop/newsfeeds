<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use App\postModel;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth',['only'=>['create','destroy','store','edit','update']]);
    }
    public function index()
    {
        $posts= postModel::orderBy('created_at','desc')->get();
        return view('backEnd.posts.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $input= $request->all();
        $input ['slug']= str_slug($input ['slug'],"-");
        postModel::create($input);

         $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Intert Success!</strong>.
                                            </div>');
        return redirect()-> Route('post.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post= postModel::Getslug($slug);
       return view('backEnd.posts.show')->with(['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=postModel::findOrFail($id);
        return view('backEnd.posts.edit',compact('post'));
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
        $post=postModel::findOrFail($id);
        $this->validate($request,[
            'title'=>'required|min:5|max:190|unique:post_Models,title,'.$post->id,
            'slug'=>'required|unique:post_Models,slug,'.$post->id,
            'redirect'=>'url|nullable',
            'body'=>'required|min:10',
            'status'=>'integer'
            ]);

        $input= $request->all();
        if($request->status != 1){
            $input['status']=0;

        }
        $post->update($input);
       $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');
      return redirect()->Route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=postModel::findOrFail($id);
        $post->delete();

        return redirect()->Route('post.index');
    }
}
