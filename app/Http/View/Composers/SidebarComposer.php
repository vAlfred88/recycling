<?php

namespace App\Http\View\Composers;

use App\Http\Resources\UserResource;
use App\Menu;
use Illuminate\View\View;

class SidebarComposer
{
    protected $user;
    protected $menu;

    /**
     * SidebarComposer constructor.
     */
    public function __construct()
    {
        $this->user = new UserResource(auth()->user());
        $this->menu = Menu::all();
    }

    public function compose(View $view)
    {
        $view->with(['user' => $this->user, 'menus' => $this->menu]);
    }
}