<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionCollection;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * @var \Spatie\Permission\Models\Permission
     */
    protected $model;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->model = new Permission();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PermissionCollection
     */
    public function index()
    {
        return new PermissionCollection($this->model->whereIn('name',
            [
                //user
                'create-users',
                'show-users',
                'update-users',
                'delete-users',
                // company
                'show-companies',
                'update-companies',
            ]
        )->get());
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
