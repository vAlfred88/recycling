<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function show(Place $place)
    {
        return new PlaceResource($place);
    }

    public function receptionsFilter(Request $request)
    {
        $company = Company::query()->find($request->get('company_id'));

        $cities = Place::query()
             ->whereIn('addressable_id', $company->receptions->pluck('id'))
            ->where('addressable_type', 'App\Reception')
            ->pluck('city');

        return $cities;
    }
}
