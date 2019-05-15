<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Repositories\MediaRepository;
use App\Http\Resources\CityResource;
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
                            ->whereHas('place', function (Builder $builder) {
                                return $builder->where('city', 'Москва');
                            })
                            ->latest()
                            ->paginate(25);

        return $companies;
    }

    public function filter(Request $request)
    {
        $companies = Company::query();

        if ($request->filled('services')) {
            $companies->whereHas('receptions.services', function (Builder $builder) use ($request) {
                return $builder->whereIn('name', $request->get('services'));
            });
        }

        if ($request->filled('city')){
            $companies->whereHas('place', function (Builder $builder) use ($request) {
                return $builder->where('city', $request->get('city'));
            });
        }

        return $companies->latest()->paginate(25);
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Company
     */
    public function store(Request $request)
    {
        $company = new Company($request->all());
        $company->save();

        if ($request->has('logo') && $request->file('logo')) {
            $media = new MediaRepository();
            $media->create($request->file('logo'), $company, 'companies/' . $company->id);
        }

        if ($request->filled('ownerid') &&  $request->filled('owner')) {
            $company->owner()->save(User::query()->find($request->get('ownerid')));
        }

        if ($request->filled('place')) {
            $company->place()->create($request->all());
        }

        return $company;
    }

    public function update(Request $request, Company $company)
    {
        $company->fill($request->except('owner'));
        $company->save();

        if ($request->filled('owner')) {
            if ($company->owner()->exists()) {
                $user = User::query()->where('company_id', $company->id)->first();
                $user->company()->dissociate();
                $user->save();
            }
            $company->owner()->save(User::query()->find($request->get('owner')));
        }

        if ($request->has('logo') && $request->file('logo')) {
            $media = new MediaRepository();
            $media->update($request->file('logo'), $company, 'companies/' . $company->id);
        }

        if ($request->filled('place_id')) {
            if ($company->place()->exists()) {
                $company->place->fill($request->all());
                $company->place->save();
            }
            $company->place()->create($request->all());
        }

        return $company;
    }

    public function getCities()
    {
        $cities = Place::query()
                       ->orderBy('city', 'asc')
                       ->pluck('city', 'id')
                       ->unique();

        return new CityResource($cities);
    }
}
