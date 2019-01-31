<?php

namespace App\Http\Repositories;

use App\Media;
use App\User;
use Illuminate\Http\Request;

class MediaRepository
{

    public function create(Request $request, User $user)
    {
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