<?php

namespace App;

/**
 * Trait HasRoles
 *
 * @package App
 * @method  \Illuminate\Database\Eloquent\Relations\BelongsToMany roles()
 */
trait HasRoles
{
    /**
     * @param $role
     *
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * @param \App\Permission $permission
     *
     * @return bool
     */
    public function hasPermission(Permission $permission): bool
    {
        return $this->hasRole($permission->roles);
    }

    /**
     * @param Role|string $role
     *
     * @return bool
     */
    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !!$role->intersect($this->roles)->count();
    }
}