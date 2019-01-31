<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 2019-01-31
 * Time: 12:29
 */

namespace App\Http\Repositories;

use App\Http\Contracts\GetterContract;
use Spatie\Permission\Models\Role;

/**
 * Class OwnerRoles
 *
 * @package App\Http\Repositories
 */
class OwnerRoles implements GetterContract
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
        $this->model = new Role();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|\Spatie\Permission\Models\Permission[]
     */
    public function get()
    {
        return $this->model->whereNotIn('name', ['admin', 'owner', 'user'])->get();
    }
}