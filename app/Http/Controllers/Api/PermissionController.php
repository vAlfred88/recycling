<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminPermissions;
use App\Http\Repositories\OwnerPermissions;
use App\Http\Repositories\PermissionRepository;
use App\Http\Resources\PermissionCollection;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Repositories\PermissionRepository $repository
     *
     * @return \App\Http\Resources\PermissionCollection
     */
    public function index(PermissionRepository $repository)
    {
        if (auth()->user()->hasRole('admin')) {
            return new PermissionCollection($repository->getRoles(new AdminPermissions()));
        }

        return new PermissionCollection($repository->getRoles(new OwnerPermissions()));
    }
}
