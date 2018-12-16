<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\UserProfileService;

class ProfileController extends Controller
{
    public function view()
    {
        $user = new UserResource(auth()->user());

        return view('profile', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $service = new UserProfileService(auth()->user());
        $service->update($request);

        return redirect()->route('profile.view');
    }
}
