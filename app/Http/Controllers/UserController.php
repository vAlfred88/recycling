<?php

namespace App\Http\Controllers;

use App\Media;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view', User::class);

        $users = User::paginate(20);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::pluck('label', 'id');

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $user = new User($request->all());
        $user->save();

        if ($request->has('user_roles')) {
            $user->roles()->sync($request->input('user_roles'));
        }

        if ($request->has('company')) {
            $user->company()->associate($request->input('company'))->save();
        }

        if ($request->has('file')) {
            $avatar = new Media(
                [
                    'file' => $request->file('file')->store("avatars/$user->id"),
                    'name' => $request->file('file')->getClientOriginalName(),
                ]
            );
            $avatar->save();

            $user->avatar()->save($avatar);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(User $user)
    {
        $this->authorize('show', $user);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->has('password') && $request->get('password') != '') {
            $user->password = $request->get('password');
        }

        $user->fill($request->except('password'));
        $user->save();

        if ($request->has('file')) {
            $avatar = new Media(
                [
                    'path' => $request->file('file')->store("avatars/$user->id"),
                    'name' => $request->file('file')->getClientOriginalName(),
                ]
            );
            $avatar->save();

            if ($user->avatar()->exists()) {
                $user->avatar()->delete();
            }

            $user->avatar()->save($avatar);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
