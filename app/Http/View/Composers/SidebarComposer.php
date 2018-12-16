<?php

namespace App\Http\View\Composers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\View\View;

class SidebarComposer
{
    protected $user;

    /**
     * SidebarComposer constructor.
     *
     * @param User $user
     */
    public function __construct()
    {
        $this->user = new UserResource(auth()->user());
    }

    public function compose(View $view)
    {
        $view->with(['user' => $this->user]);
    }
}