<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table='categories';
    protected $fillable = [
		'cate_name',
		'cate_body',
		'status',
		'user_id'
    ];

   public function User(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
    
}
