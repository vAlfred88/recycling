<?php

namespace App\Http\View\Composers;

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
        $this->menu = Menu::all();
    }

    public function compose(View $view)
    {
        $view->with(['menus' => $this->menu]);
    }
}