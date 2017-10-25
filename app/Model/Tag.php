<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
	
class Tag extends Model
{

	protected $table = 'tags';
    protected $fillable = ['name'];
    
    public function articles (){
    	return $this->belongsToMany('App\Model\Article','article_tag')->where('is_publish',1);
    }

    public function getRouteKeyName (){
    	return 'id';
    }
   
}
