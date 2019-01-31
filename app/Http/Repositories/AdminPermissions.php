<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 2019-01-31
 * Time: 12:29
 */

namespace App\Http\Repositories;

use App\Http\Contracts\GetterContract;
use Spatie\Permission\Models\Permission;

/**
 * Class AdminPermissions
 *
 * @package App\Http\Repositories
 */
class AdminPermissions implements GetterContract
{

    /**
     * @var \Spatie\Permission\Models\Permission|\Illuminate\Database\Eloquent\Builder
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
     * @return \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[]
     */
    public function get()
    {
        return $this->model->all();
    }
}