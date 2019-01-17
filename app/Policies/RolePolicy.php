<?php

namespace App\Policies;

use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param \App\User $user
     *
     * @param \App\Role $role
     *
     * @return bool
     */
    public function before(User $user, Role $role)
    {
        if ($role->id >= 3) {
            return true;
        }

        return null;
    }
}
