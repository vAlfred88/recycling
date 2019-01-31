<?php

namespace App\Http\Repositories;

use App\Http\Contracts\GetterContract;

/**
 * Class PermissionRepository
 *
 * @package App\Http\Repositories
 */
class PermissionRepository
{
    /**
     * @param \App\Http\Contracts\GetterContract $contract
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[]
     */
    public function getRoles(GetterContract $contract)
    {
        return $contract->get();
    }
}