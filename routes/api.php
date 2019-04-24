<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->middleware('auth:api')->group(function () {
    Route::get('companies/filter', 'CompanyController@filter');
    Route::resource('companies', 'CompanyController');
    Route::get('owners', 'UserController@getOwners');
});



