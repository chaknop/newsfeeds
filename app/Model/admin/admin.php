<?php

namespace App\model\admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class admin extends Authenticatable
{
    use Notifiable;
     public function roles()
    {
        return $this->belongsToMany('App\Model\admin\Role');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function getNameAttribute($value)
        {
            return ucfirst($value);
        }
        
    protected $fillable = [
        'name', 'email', 'password','status','image','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
