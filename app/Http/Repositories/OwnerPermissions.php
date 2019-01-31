<?php

namespace App\Http\Repositories;

use App\Http\Contracts\GetterContract;
use Spatie\Permission\Models\Permission;

/**
 * Class OwnerPermissions
 *
 * @package App\Http\Repositories
 */
class OwnerPermissions implements GetterContract
{

    /**
     * @var \Spatie\Permission\Models\Role|\Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    /**
     * OwnerRoles constructor.
     */
    public function __construct()
    {
        $this->model = new Permission();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|\Spatie\Permission\Models\Permission[]
     */
    public function get()
    {
        return $this->model->whereNotIn('name', [
            //user
            'create-users',
            'show-users',
            'update-users',
            'delete-users',
            // company
            'show-companies',
            'update-companies',
        ])->get();
    }
}