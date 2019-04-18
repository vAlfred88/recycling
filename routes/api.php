<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('companies/filter', function (Request $request) {
    $companies = \App\Company::query()->whereHas('receptions.services', function
    (\Illuminate\Database\Eloquent\Builder $builder) use ($request) {
        return $builder->whereIn('name', $request->get('services'));
    })->get();

    return $companies;
});

Route::namespace('Api')->group(function () {
    Route::get('companies', 'CompanyController@index');
});



