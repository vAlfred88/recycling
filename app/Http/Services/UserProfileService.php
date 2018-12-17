<?php

namespace App\Http\Services;

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

        if ($this->user->profile) {
            $this->user->profile->fill($request->only(['phone', 'position']));
        } else {
            $this->user->profile()->create($request->only(['phone', 'position']));
        }

        $this->user->save();
        $this->user->profile->save();
    }
}