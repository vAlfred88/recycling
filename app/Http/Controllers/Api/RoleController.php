<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\OwnerRoles;
use App\Http\Repositories\RoleRepository;
use App\Http\Resources\RoleCollection;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * @var \Spatie\Permission\Models\Role
     */
    protected $model;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->model = new Role;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Repositories\RoleRepository $repository
     *
     * @return \App\Http\Resources\RoleCollection
     */
    public function index(RoleRepository $repository)
    {
        return new RoleCollection($repository->getRoles(new OwnerRoles()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
