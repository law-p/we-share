<?php

namespace App\Policies;

use App\Models\Share;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SharePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Share $share)
    {
        return ($user->is_admin || $user->id === $share->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Share $share)
    {
        return ($user->is_admin || $user->id === $share->user_id);
    }

 
}
