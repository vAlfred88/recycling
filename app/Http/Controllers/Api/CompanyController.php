<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::query()
                            ->latest()
                            ->paginate(25);

        return $companies;
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }
}
