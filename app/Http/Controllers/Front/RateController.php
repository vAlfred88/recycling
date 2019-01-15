<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();

        return view('front.rating.index', compact('companies'));
    }
}
