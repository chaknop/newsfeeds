<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;

use App\Model\Category;
use Auth;
use App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:posts.category');
    }

    public function index()
    {
        $category=Category::orderBy('id','desc')->get();
        return view('backEnd.categories.index',compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backEnd.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatRequest $request)
    {
        $data= $request->all();
        $data['user_id'] = Auth::id();
        Category::create($data);

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Intert Success!</strong>.
                                            </div>');

        return redirect()->route('category.create');
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
       $category=Category::findOrFail($id);
        return view('backEnd.categories.edit',compact('category'));
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
        $category=Category::findOrFail($id);

         $this->validate($request,[
            'cate_name'=>'required|min:5|max:190|unique:categories,cate_name,'.$category->id,
            'cate_body'=>'nullable',
            'status'=>'integer'
            ]);

        $input= $request->all();
        if($request->status != 1){
            $input['status']=0;

        }
        $category->update($input);
        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');
      return redirect()->Route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=category::findOrFail($id);
        $category->delete();

        return redirect()->Route('category.index');
    }
}
