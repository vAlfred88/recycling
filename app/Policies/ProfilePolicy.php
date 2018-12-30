<?php

namespace App\Policies;

use App\Profile;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->profile()->exists();
    }


    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\User $user
     * @param  \App\Profile $profile
     *
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        //
    }
}
