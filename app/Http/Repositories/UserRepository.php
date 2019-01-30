<?php

namespace App\Http\Repositories;

use App\Http\Contracts\CreatableContract;
use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function create(Request $request, User $user)
    {
        $user->fill($request->all());

        if ($request->has('password')) {
            $user->password = 'password';
        }

        $user->save();

        $profile = new ProfileRepository();
        $profile->create($request, $user);

        if ($request->has('role')) {
            $user->roles()->sync($request->get('role'));
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->get('permissions'));
        }

        if ($request->has('company')) {
            $user->company()->associate($request->get('company'))->save();
        }

        if ($request->has('avatar') && $request->file('avatar')) {
            $media = new MediaRepository();
            $media->create($request, $user);
        }
    }

    public function update(Request $request)
    {
        // TODO: Implement update() method.
    }
}