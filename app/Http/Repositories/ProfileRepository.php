<?php

namespace App\Http\Repositories;

use App\User;
use Illuminate\Http\Request;

class ProfileRepository
{
    public function create(Request $request, User $user)
    {
        $user->profile()->create();

        if ($request->has('phone')) {
            $user->profile->phone = $request->get('phone');
        }

        if ($request->has('position')) {
            $user->profile->position = $request->get('position');
        }

        $user->profile->save();
    }
}