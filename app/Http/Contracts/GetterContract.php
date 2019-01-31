<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 2019-01-30
 * Time: 11:20
 */

namespace App\Http\Contracts;

/**
 * Interface GetterContract
 *
 * @package App\Http\Contracts
 */
interface GetterContract
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[]
     */
    public function get();
}