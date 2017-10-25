<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postModel extends Model
{
    protected $table='post_Models';
    protected $fillable=[
    'title',
    'slug',
    'redirect',
    'body',
    'status'
    ];
    public function scopeGetslug($query,$slug){
    	return $query->where('slug',$slug)
    	->where('status',1)
        ->firstOrFail();
    }
}
