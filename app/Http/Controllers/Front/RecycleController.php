<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Http\Controllers\Controller;
use App\Service;

class RecycleController extends Controller
{
    public function show(Company $company)
    {
        $users = $company->users;
        $receptions = $company->receptions;
        $services = Service::all();

        return view('front.recycles.show', compact('company', 'users', 'services', 'receptions'));
    }
}
