<?php

use App\Company;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * @param $class
 * @param array $attributes
 * @param null $times
 * @return mixed
 */
function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}

/**
 * @param $class
 * @param array $attributes
 * @param null $times
 * @return mixed
 */
function make($class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}

/**
 * @param $role
 *
 * @return mixed
 */
function createUserWithRole($role)
{
    create(Role::class, ['name' => 'owner']);
    $user = create(User::class);
    $user->assignRole($role);

    return $user;
}

function createUserWithPermission($permission) {
    create(Permission::class, ['name' => $permission]);
    $user = create(User::class);
    $user->givePermissionTo($permission);

    return $user;
}

/**
 * @param \App\User|null $user
 *
 * @return mixed
 */
function createCompanyWithOwner(?User $user = null)
{
    $company = create(Company::class);
    if ($user) {
        $company->owner()->save($user);
    }
    $company->owner()->save(createUserWithRole('owner'));

    return $company;
}
