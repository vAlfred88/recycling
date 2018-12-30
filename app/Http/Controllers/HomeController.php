<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @var array
     */
    protected $roles = [
        'admin',
        'owner',
        'user',
    ];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view($this->getHomePage(auth()->user()));
    }

    /**
     * @param $user
     *
     * @return string
     */
    protected function getHomePage($user)
    {
        foreach ($this->roles as $role) {
            if ($user->hasRole($role)) return "home.$role";
        }
    }
}
