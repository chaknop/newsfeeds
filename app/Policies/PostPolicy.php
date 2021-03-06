<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\admin  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function view(admin $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
         return $this->getPermission($user,5);
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\admin  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,6);
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\admin  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,7);
    }

    public function tag(admin $user)
    {
        return $this->getPermission($user,11);
    }

    public function category(admin $user)
    {
        return $this->getPermission($user,12);
    }

     public function user(admin $user)
    {
        return $this->getPermission($user,14);
    }

    public function role(admin $user)
    {
        return $this->getPermission($user,15);
    }

    public function permission(admin $user)
    {
        return $this->getPermission($user,16);
    }


    protected function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
