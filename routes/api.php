<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function () {
    Route::resource('companies', 'CompanyController');
    Route::get('companies/filter', 'CompanyController@filter');
});



