<?php
/**
 * Created by PhpStorm.
 * User: alfred
 * Date: 2019-01-30
 * Time: 08:58
 */

namespace App\Http\Repositories;


use App\Http\Contracts\CreatableContract;
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