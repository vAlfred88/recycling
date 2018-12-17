<?php

namespace App\Http\View\Composers;

use App\Http\Resources\UserResource;
use Illuminate\View\View;

class SidebarComposer
{
    protected $user;

    /**
     * SidebarComposer constructor.
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