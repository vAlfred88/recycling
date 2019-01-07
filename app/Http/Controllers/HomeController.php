<?php

namespace App\Http\Controllers;

use App\Company;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show()
    {
        $this->authorize('view', Company::class);

        $company = auth()->user()->company;

        return view('companies.index', compact('company'));
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

        return abort(404);
    }
}
