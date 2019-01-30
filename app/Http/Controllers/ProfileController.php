<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Resources\UserResource;
use App\Http\Repositories\UserProfileRepository;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * @return \App\Http\Resources\UserResource|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function view()
    {
        $this->authorize('view', Profile::class);

        $user = new UserResource(auth()->user());

        if (request()->ajax()){
            return $user;
        }

        return view('profile', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $service = new UserProfileRepository(auth()->user());
        $service->update($request);

        return redirect()->route('profile.view');
    }
}
