<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class permission_role extends Model
{
    protected $table = 'permission_role';
 	protected $fillable = ['permission_id','role_id'];
}
