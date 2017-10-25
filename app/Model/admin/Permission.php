<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name','for'];

public function roles(){
    	return $this->belongsToMany('App\Model\admin\Role','permission_role');
    }
}
