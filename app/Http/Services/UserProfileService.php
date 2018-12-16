<?php

namespace App\Http\Services;

use App\User;
use Illuminate\Http\Request;

class UserProfileService
{
    protected $user;

    /**
     * UserProfileService constructor.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function update(Request $request)
    {
        $this->user->fill($request->only(['name', 'email', 'password']));
        $this->user->profile()->firstOrCreate($request->only(['phone', 'position']));

        $this->user->save();
        $this->user->profile->save();
    }
}