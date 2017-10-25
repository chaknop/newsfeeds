<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'title',
		'body',
		'image',
		'publish_on',
		'is_publish',
		'user_id',
		'sub_id',
		'user_id',
    ];

    public function User(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function subCategory(){
        return $this->belongsTo('App\Model\SubCategory','sub_id','id');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\Tag','article_tag');
    }

    public function getRouteKeyName (){
        return 'id';
    }
    public function scopeSearch($query,$search){
        return $query->where('title', 'like', '%'.$search.'%')
                        ->orWhere('body','like', '%'.$search.'%');
    }
}
