<?php

namespace App\Policies;
use App\Notify;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class NotifyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     public function update(User $user, Notify $notify)
    {
         if($user->hasRole('admin')){
           return $notify;
        }

        return $user->id === $notify->user_id;
    }
    
}
