<?php

use Illuminate\Support\Facades\Route;

Route::domain('my.' . config('app.url'))->group(function () {
    Route::namespace('Api')->group(function () {
        Route::get('companies/filter', 'CompanyController@filter');
        Route::resource('companies', 'CompanyController');
        Route::get('owners', 'UserController@getOwners');
    });
});
