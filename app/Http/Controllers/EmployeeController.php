<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        //        $this->authorize('show-users');

        $company = auth()->user()->company;
        $users = auth()->user()->company->users()->paginate(20);

        return view('employees.index', compact('users', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        //        $this->authorize('create-users');

        $roles = Role::where('id', '>=', 3)->pluck('name', 'id');

        return view('employees.create', compact('roles'));
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
        //        $this->authorize('create-users');

        $request->merge(['company_id' => auth()->user()->company_id]);

        $user = new User($request->all());
        $user->save();

        $user->assignRole('employee');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(User $user)
    {
        //        $this->authorize('show-users');

        return view('employees.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        //        $this->authorize('update-users');

        $roles = Role::where('id', '>=', 3)->pluck('name', 'id');

        return view('employees.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, User $user)
    {
        //        $this->authorize('update-users');

        if ($request->has('password') && $request->get('password') != '') {
            $user->password = $request->get('password');
        }

        $user->fill($request->except('password'));
        $user->save();

        $user->assignRole('employee');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $user)
    {
        //        $this->authorize('delete-users');

        $user->delete();

        return back();
    }
}
