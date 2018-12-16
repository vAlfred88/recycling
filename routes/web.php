<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('my.' . config('app.url'))->group(function () {
    Route::middleware('auth')->group(function () {
        Route::resource('companies', 'CompanyController');
        Route::get('profile', 'ProfileController@view')
            ->name('profile.view');
        Route::put('profile', 'ProfileController@update')
            ->name('profile.update');
    });
    Route::get('/', function () {
        return view('index');
    })->name('company.home');

    Auth::routes();
});

Route::get('/', function () {
    return view('welcome');
});
