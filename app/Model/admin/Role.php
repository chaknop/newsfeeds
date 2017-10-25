<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function permissions()
    {
    	return $this->belongsToMany('App\Model\admin\Permission');
    }
}
