<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function () {
    Route::get('companies/filter', 'CompanyController@filter');
    Route::resource('companies', 'CompanyController');
    Route::get('owners', 'UserController@getOwners');
});



