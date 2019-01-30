<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $role;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->role = new Role();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Role[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view-roles');

        if (request()->ajax()) {
            return $this->role->all();
        }

        $roles = $this->role->paginate(20);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create-roles');

        // todo: move to view composer
        $menus = Menu::all();

        return view('roles.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create-roles');

        $this->role->create($request->except('permissions'));

        $this->assignPermissions($request);

        return redirect()->back();
    }

    public function assignPermissions(Request $request)
    {
        if ($request->has('permissions')) {
            foreach ($request->get('permissions') as $permission) {
                Permission::firstOrCreate(
                    [
                    'name' => $permission,
                    'label' => $permission,
                ]);

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Role $role)
    {
        $this->authorize('show-roles');

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Role $role)
    {
        $this->authorize('edit-roles');

        // todo: move to view composer
        $menus = Menu::all();

        return view('roles.edit', compact('role', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('edit-roles');

        $role->fill($request->except('permissions'));
        $role->save();

        $this->assignPermissions($request);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete-roles');

        $role->delete();

        return back();
    }
}
