<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 2019-01-31
 * Time: 12:31
 */

namespace App\Http\Repositories;

use App\Http\Contracts\GetterContract;
use Spatie\Permission\Models\Role;

/**
 * Class AdminRoles
 *
 * @package App\Http\Repositories
 */
class AdminRoles implements GetterContract
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
     * @return \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[]
     */
    public function get()
    {
        return $this->model->all();
    }
}