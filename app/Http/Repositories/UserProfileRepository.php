<?php

namespace App\Http\Repositories;

use App\Media;
use Illuminate\Http\Request;

class UserProfileRepository
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
        $this->user->fill($request->only(['name', 'email']));

        if ($request->has('password') && isset($request->password)){
            $this->user->password = $request->get('password');
        }

        if ($this->user->profile) {
            $this->user->profile->fill($request->only(['phone', 'position']));
        } else {
            $this->user->profile()->create($request->only(['phone', 'position']));
        }

        if ($request->has('avatar')) {
            if ($request->file('avatar')) {
                $avatar = new Media(
                    [
                        'path' => $request->file('avatar')->store('avatars/' . $this->user->id),
                        'name' => $this->user->name,
                    ]
                );
                $avatar->save();

                if ($this->user->avatar()->exists()) {
                    $this->user->avatar()->delete();
                }

                $this->user->avatar()->save($avatar);
            }
        }

        $this->user->save();
        $this->user->profile->save();
    }
}