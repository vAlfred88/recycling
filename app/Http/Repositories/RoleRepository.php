<?php

namespace App\Http\Repositories;

use App\Http\Contracts\GetterContract;

/**
 * Class RoleRepository
 *
 * @package App\Http\Repositories
 */
class RoleRepository
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