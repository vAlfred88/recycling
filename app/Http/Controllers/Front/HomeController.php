<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::query()
                            ->take(10)
                            ->orderBy('receptions_count', 'desk')
                            ->get();

        return view('front.home', compact('companies'));
    }
}
