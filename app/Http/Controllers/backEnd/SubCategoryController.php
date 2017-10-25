<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\Category;
use Auth;
class SubCategoryController extends Controller
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
    private $sub_category,$date,$author,$limit=5;
    public function index()
    {
        $subCategory=SubCategory::orderBy('id','desc')->get();
        return view('backEnd.sub_categories.index',compact('subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plucked= Category::pluck('cate_name','id');
        $categories = [''=>'Select Category'] +  $plucked->all();
       return view('backEnd.sub_categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $data= $request->all();
             $this->validate($request,[
            'cate_id'=>'exists:categories,id',
            
            'sub_name'=>'required|unique:sub_categories,sub_name,NULL,id,cate_id,'
            .$data['cate_id'],
            'status'=>'integer'
            ]);

      
        $data['user_id'] = Auth::id();
        SubCategory::create($data);

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Intert Success!</strong>.
                                            </div>');

        return redirect()->route('sub_category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = preg_replace ( '#[^0-9]#', '', $id );
        
        if($id != "" && !empty($id)) {
            
            $sub_category = SubCategory::where('id',$id)->first();
            
            if ( $sub_category){
                return view('backEnd.sub_categories.show', compact('sub_category'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $plucked= Category::pluck('cate_name','id');
        $categories = [''=>'Select Category'] +  $plucked->all();

         $subCategory=SubCategory::findOrFail($id);
        return view('backEnd.sub_categories.edit',compact('categories','subCategory'));
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
        $subCategory=SubCategory::findOrFail($id);
         $input= $request->all();
        $this->validate($request,[
             'cate_id'=>'exists:categories,id',
            'sub_name' => 'required|string|max:255',
            
            ]);

       
        if($request->status != 1){
            $input['status']=0;

        }
         $subCategory->update($input);
        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');
      return redirect()->Route('sub_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $sub_category=SubCategory::findOrFail($id);
        $sub_category->delete();

        return redirect()->Route('sub_category.index');
    }
}
