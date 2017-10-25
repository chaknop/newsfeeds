<?php

namespace App\Http\Controllers\frontEnd;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\Category;
use Image;
use App\Model\Article;
use App\Model\Tag;
use App\User;
use File;

use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
    public function __construct()
    {
        $this->middleware('auth');
    }

{{date('M j, Y h:ia', strtotime($article2->created_at))}}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $article=Article::where('is_publish',1)->orderBy('id','desc')->limit(5)->get();
        $tags=Tag::orderBy('id','desc')->limit(6)->get();
        $SubCategory=SubCategory::orderBy('id','desc')->get();
        
        $artss = Article::where([
            ['sub_id',8],
            ['is_publish', 1],
        ])->orderBy('id','desc')->limit(5)->get();

        $article_cat=Article::where([
            ['sub_id',4],
            ['is_publish', 1],
        ])->orderBy('id','desc')->get();

        $health = Article::where([
            ['sub_id',6],
            ['is_publish', 1],
        ])->orderBy('id','desc')->limit(5)->get();

        $Sport = Article::where([
            ['sub_id',2],
            ['is_publish', 1],
        ])->orderBy('id','desc')->limit(5)->get();
        
        return view('frontEnd.index',compact('artss','article','SubCategory','tags','article_cat','article3','health','Sport'));

        
    }

    public function show($id)
    {
        $id = preg_replace ( '#[^0-9]#', '', $id );
        if($id != "" && !empty($id)) {

        $tags=Tag::orderBy('id','desc')->limit(6)->get();
        $article=Article::where('is_publish',1)->orderBy('id','desc')->limit(5)->get();
        $SubCategory=SubCategory::orderBy('id','desc')->get();
        
        $article2=Article::findOrFail($id);

        $catId = SubCategory::findOrFail($article2->sub_id);
        $relatePost = Article::orderBy('id','desc')->OrWhere('is_publish',1)->where('sub_id',$catId->id)->limit(4)->get();
     

       return view('frontEnd/single_page',compact('article2','article','SubCategory','tags', 'relatePost'));
        }
        return redirect()->route('notfound');
    }
     public function tag(Tag $tag)
    {

        $article_tag= $tag->articles()->paginate(2);

        $article=Article::where('is_publish',1)->orderBy('id','desc')->limit(5)->get();
        $SubCategory=SubCategory::orderBy('id','desc')->get();
        $tags=Tag::orderBy('id','desc')->limit(6)->get();
       return view('frontEnd/tag',compact('article_tag','SubCategory','tags','article'));
    }

    public function category(SubCategory $SubCat)
    {
        $article_category= $SubCat->article();
        
         $article=Article::where('is_publish',1)->orderBy('id','desc')->limit(5)->get();
        $SubCategory=SubCategory::orderBy('id','desc')->get();
        $tags=Tag::orderBy('id','desc')->limit(6)->get();

        return view('frontEnd/category',compact('article','SubCategory','tags','article_category'));
    }
    public function pagenotfound(){
        $article=Article::where('is_publish',1)->orderBy('id','desc')->limit(5)->get();
        $tags=Tag::orderBy('id','desc')->limit(6)->get();
        $SubCategory=SubCategory::orderBy('id','desc')->get();
      
        return view('errors.404',compact('article','SubCategory','tags'));
    }

}
