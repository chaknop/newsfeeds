<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\Category;
use App\Model\Article;
use App\Model\Tag;
use App\User;
use Image;
use File;
use Auth;
class ArticleController extends Controller
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

    public function index(Request $request)
    {
       
        //$search= $request->input('search');
        $article=Article::orderBy('created_at','desc')->get();
        return view('backEnd.articles.index',compact('article'));
      
    }

    /**
     * Show the form for creating a new resource ...
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if (Auth::user()->can('posts.create')) {
        $plucked= SubCategory::pluck('sub_name','id');
        $SubCategory = [''=>'Select Sub Category'] +  $plucked->all();

        $tags =Tag::all();
       return view('backEnd.articles.create',compact('SubCategory','tags'));
        }
        return redirect(route('article.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->all();
       $this->validate($request,[
        'image'=>'image',
       
        'title'=>'required|unique:articles,title|max:250'

        ]);
       if($request->file('image')){

        $image= $request->file('image');

        $filename= time().'-'.str_slug($input['title'],"-").'.'.$image->GetClientOriginalExtension();
        $image_path= public_path('images/'.$filename);
        $image_thumb_path= public_path('images/thumbnail/'.$filename);

        $image_upload= Image::make($image->getRealPath())->save($image_path);

        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $image_upload->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image_thumb_path);

        $input['image']= $filename;  
       }
       $input['user_id']= Auth::id();

       $article = Article::create($input);

        $article->tags()->sync($request->tags);

        $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Intert Success!</strong>.
                                            </div>');

        return redirect()->Route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $article=Article::findOrFail($id);
       return view('backEnd/articles/show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')) {
        $plucked= SubCategory::pluck('sub_name','id');
        $SubCategory = [''=>'Select Sub Category'] +  $plucked->all();
        $article = Article::with('tags')->findOrFail($id);
       
        $tags =Tag::all();
        return view('backEnd.articles.edit',compact('SubCategory','article','tags'));
        }
        return redirect()->Route('article.index');
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
         $article = Article::findOrFail($id);
         $input= $request->all();

       $this->validate($request,['image'=>'image']);

       if($request->file('image')){

            $image= $request->file('image');

            $filename= time().'-'.str_slug($input['title'],"-").'.'.$image->GetClientOriginalExtension();
            $image_path= public_path('images/'.$filename);
            $image_thumb_path= public_path('images/thumbnail/'.$filename);

            $image_upload= Image::make($image->getRealPath())->save($image_path);

            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            $image_upload->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_thumb_path);

            $input['image']= $filename;  

            if(File::exists(public_path('images/'.$article->image))){
                File::delete(public_path('images/'.$article->image));
            }
            if(File::exists(public_path('images/thumbnail/'.$article->image))){
                File::delete(public_path('images/thumbnail'.$article->image));
            }

       }
       if($request->is_publish != 1){
            $input['is_publish']=0;
         }   
        $article->tags()->sync($request->tags);
        $article->update($input);

         $request->session()->flash('message','<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Update Success!</strong>.
                                            </div>');
       
        return redirect()->Route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $article=Article::findOrFail($id);
            //delete tag safely 
            $article->tags()->detach();
            $article->delete();
        //delete image
         if(File::exists(public_path('images/'.$article->image))){
                File::delete(public_path('images/'.$article->image));
            }
            if(File::exists(public_path('images/thumbnail/'.$article->image))){
                File::delete(public_path('images/thumbnail'.$article->image));
            }

        return redirect()->Route('article.index');
    }

}
