<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Http\Controllers\Controller;

class RecycleController extends Controller
{
    public function show(Company $company)
    {
        $users = $company->users;

        return view('front.recycles.show', compact('company', 'users'));
    }
}
