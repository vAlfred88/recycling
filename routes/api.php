<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function () {
    Route::get('companies', 'CompanyController@index');
    Route::get('companies/filter', 'CompanyController@filter');
});



