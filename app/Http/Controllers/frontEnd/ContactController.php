<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Tag;
use App\Model\SubCategory;
use Mail;
use App\Mail\sendMail;
class ContactController extends Controller
{
    public function index(){
    	$article=Article::where('is_publish',1)->orderBy('id','desc')->limit(5)->get();
        $tags=Tag::orderBy('id','desc')->limit(6)->get();
        $SubCategory=SubCategory::orderBy('id','desc')->get();

        return view('frontEnd.contacts',compact('article','SubCategory','tags'));
    }

    public function send(){
    	Mail::send(new sendMail());
    }

    public function email(){
    	return view('frontEnd.contacts');
    }
}
