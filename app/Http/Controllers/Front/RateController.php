<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Http\Controllers\Controller;
use App\Service;

class RateController extends Controller
{
    public function index()
    {
        $companies = Company::query()->latest()->get();
        $services = Service::all();

        return view('front.rating.index', compact('companies', 'services'));
    }
}
