<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Media;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getOwners()
    {
        $owners = User::query()->role('owner')->whereDoesntHave('company')->get();

        return UserResource::collection($owners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param \App\Http\Repositories\UserRepository $repository
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request, UserRepository $repository)
    {
        $repository->create($request, new User());

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
