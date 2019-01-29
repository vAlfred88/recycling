<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Media;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $this->authorize('create-users');

        $user = new User($request->all());

        if ($request->ajax()) {
            $user->password = 'password';
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

        if ($request->has('roles')) {
            $user->roles()->sync($request->get('roles'));
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->get('permissions'));
        }

        $user->company()->associate(auth()->user()->company)->save();

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

        return response(['message' => 'User created']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();

        if ($request->has('phone')) {
            $user->profile->fill(['phone' => $request->get('phone')]);
        }

        if ($request->has('position')) {
            $user->profile->fill(['position' => $request->get('position')]);
        }

        $user->profile->save();

        if ($request->has('roles')) {
            $user->roles()->sync($request->get('roles'));
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->get('permissions'));
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

        return response(['message' => 'User updated']);
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
