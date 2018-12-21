<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view-roles');

        $roles = Role::paginate(20);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

        return view('roles.create', compact('menus'));
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
        $role = new Role($request->all());
        $role->save();

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('name', $request->input('permissions'))->pluck('id');
        }

        $role->permissions()->sync($permissions ?? null);

        return redirect()->back();
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
        $role = Role::find($id);

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $menus = Menu::all();

        return view('roles.edit', compact('role', 'menus'));
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
        $role = Role::find($id);

        $role->fill($request->all());
        $role->save();

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('name', $request->input('permissions'))->pluck('id');
        }

        $role->permissions()->sync($permissions ?? null);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        Role::find($id)->delete();

        return redirect()->back();
    }
}
