<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('my.' . config('app.url'))->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('company', 'HomeController@show')->name('company');

        Route::resource('companies', 'CompanyController');

        Route::get('profile', 'ProfileController@view')
             ->name('profile.view');
        Route::put('profile', 'ProfileController@update')
             ->name('profile.update');

        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('menus', 'MenuController');
        Route::resource('users', 'UserController');
    });

    Auth::routes();
});

Route::get('/', function () {
    return view('welcome');
});
