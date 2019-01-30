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

        // todo move to other part, for create from admin and owner/employee
        $user->company_id = auth()->user()->company_id;

        $user->save();

        // todo create model event and move it there
        $profile = new ProfileRepository();
        $profile->create($request, $user);

        // todo make something to move it out
        if ($request->has('roles')) {
            $user->roles()->sync($request->get('roles'));
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->get('permissions'));
        }

        // todo make method or someone else
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