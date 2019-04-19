<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Repositories\MediaRepository;
use App\Http\Resources\CompanyResource;
use App\Place;
use App\User;
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

    public function store(Request $request)
    {
        $company = new Company();
        $company->create($request->all());

        if ($request->has('logo') && $request->file('logo')) {
            $media = new MediaRepository();
            $media->create($request->file('logo'), $company, 'companies/' . $company->id);
        }

        $company->place()->create($request->all());

        if ($request->get('with_owner') && $request->has('with_owner')) {
            $owner = new User(
                [
                    'name' => $request->get('owner_name'),
                    'email' => $request->get('owner_email'),
                    'password' => 'secret',
                ]
            );

            $owner->save();

            $owner->assignRole('owner');

            $company->users()->save($owner);
        }

        return $company;
    }

    public function update(Request $request, Company $company)
    {
        $company->fill($request->all());

        if ($request->has('logo') && $request->file('logo')) {
            $media = new MediaRepository();
            $media->create($request->file('logo'), $company, 'companies/' . $company->id);
        }

        if ($company->place()->exists()) {
            $place = Place::query()->find($company->place->id);

            $place->fill($request->all());
            $place->save();
        }

        return $company;
    }
}
