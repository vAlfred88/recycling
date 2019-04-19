<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::query()
                            ->latest()
                            ->paginate(25);

        return $companies;
    }

    public function filter(Request $request)
    {
        $companies = Company::query()
                            ->whereHas('receptions.services', function (Builder $builder) use ($request) {
                                return $builder->whereIn('name', $request->get('services'));
                            })
                            ->latest()
                            ->paginate(25);

        return $companies;
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }
}
