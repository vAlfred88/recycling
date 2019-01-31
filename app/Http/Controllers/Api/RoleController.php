<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRoles;
use App\Http\Repositories\OwnerRoles;
use App\Http\Repositories\RoleRepository;
use App\Http\Resources\RoleCollection;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Repositories\RoleRepository $repository
     *
     * @return \App\Http\Resources\RoleCollection
     */
    public function index(RoleRepository $repository)
    {
        if (auth()->user()->hasRole('admin')){
            return new RoleCollection($repository->getRoles(new AdminRoles()));
        }
        return new RoleCollection($repository->getRoles(new OwnerRoles()));
    }
}
