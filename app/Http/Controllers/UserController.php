<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Resources\UserResource;
use App\Media;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\User|\App\User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
//        $this->authorize('view', User::class);

        $users = User::paginate(20);

        if (request()->ajax()) {
            return Company::find(auth()->user()->company_id)->users;
        }

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

        $roles = Role::pluck('name', 'id');

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

        if ($request->ajax()) {
            $user->password = str_random(6);
        }

        $user->save();
        $user->profile()->create();

        if ($request->has('phone')) {
            $user->profile->fill(['phone' => $request->get('phone')]);
        }

        if ($request->has('position')) {
            $user->profile->fill(['position' => $request->get('position')]);
        }

        $user->profile->save();

        if ($request->has('role')) {
            $user->roles()->sync($request->get('role'));
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->get('permissions'));
        }

        if ($request->has('company')) {
            $user->company()->associate($request->get('company'))->save();
        }

        if ($request->has('avatar')) {
            if ($request->file('avatar')) {
                $avatar = new Media(
                    [
                        'path' => $request->file('avatar')->store("avatars/$user->id"),
                        'name' => $user->name,
                    ]
                );
                $avatar->save();

                $user->avatar()->save($avatar);
            }
        }

        return redirect()->back()->with('flash', 'Пользователь успешно добавлен');
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
     * @return \App\Http\Resources\UserResource|\App\User|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (request()->ajax()) {
            return new UserResource($user);
        }

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
        //fixme
        if ($request->has('password') && $request->get('password') != '') {
            $user->password = $request->get('password');
        }

        $user->fill($request->except('password'));
        $user->save();

        if ($request->has('roles')) {
            $user->roles()->sync($request->input('user_roles'));
        }

        if ($request->has('company')) {
            $user->company()->associate($request->input('company'))->save();
        }

        if ($request->has('avatar')) {
            if ($request->file('avatar')) {
                $avatar = new Media(
                    [
                        'path' => $request->file('avatar')->store("avatars/$user->id"),
                        'name' => $user->name,
                    ]
                );
                $avatar->save();

                if ($user->avatar()->exists()) {
                    $user->avatar()->delete();
                }

                $user->avatar()->save($avatar);
            }
        }

        if ($request->ajax()) {
            return response(204);
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

        return back()->with('flash', 'Пользователь успешно удален');;
    }
}
