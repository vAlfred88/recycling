<?php

namespace App\Http\Repositories;

use App\Http\Contracts\RoleContract;
use Spatie\Permission\Models\Role;

class OwnerRoles implements RoleContract{

    /**
     * @var \Spatie\Permission\Models\Role|\Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    /**
     * OwnerRoles constructor.
     */
    public function __construct()
    {
        $this->model = new Role();
    }


    public function get()
    {
        return $this->model->whereNotIn('name', ['admin', 'owner', 'user'])->get();
    }
}

class RoleRepository
{
    public function getRoles(RoleContract $role)
    {
        return $role->get();
    }
}