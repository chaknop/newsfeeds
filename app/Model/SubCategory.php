<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	protected $table='sub_categories';
    protected $fillable = [
		'sub_name',
		'sub_body',
		'status',
		'cate_id',
		'user_id',
    ];

    public function user(){
    	return $this->belongsTo(App\User::class,'user_id','id');
    }

    public function category(){
    	return $this->belongsTo(Category::class,'cate_id');
    }

    public function article(){
    	return $this->hasMany('App\Model\Article','sub_id','id')->where('is_publish',1)->orderBy('id','desc')->paginate(2);
    }

    public function getRouteKeyName (){
        return 'id';
    }

    
}
