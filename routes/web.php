<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('my.' . config('app.url'))->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('profile', 'ProfileController@view')
             ->name('profile.view');
        Route::put('profile', 'ProfileController@update')
             ->name('profile.update');

        //Company
        //todo move routes to company group, fix routes
        Route::get('company', 'HomeController@show')->name('company');
        Route::resource('employees', 'EmployeeController');

        Route::name('company.')->namespace('Company')->group(function () {
            Route::resource('receptions', 'ReceptionController');
        });

        // Admin
        Route::resource('companies', 'CompanyController');
        Route::resource('menus', 'MenuController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('services', 'ServiceController');
    });

    Auth::routes();
});

Route::name('api.')->prefix('api')->namespace('Api')->group(function () {
    Route::resource('roles', 'RoleController')
         ->only('index');
    Route::resource('permissions', 'PermissionController')
         ->only('index');
    Route::resource('users', 'UserController')
         ->only('store', 'update');
});

Route::name('front.')->namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/recycle/{company}', 'RecycleController@show')
         ->name('companies.show');
    Route::get('rating', 'RateController@index')->name('rating');
});