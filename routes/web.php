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
            Route::get('receptions/map', 'ReceptionController@showMap')->name('receptions.map');
            Route::resource('receptions', 'ReceptionController');
        });

        // Admin
        Route::resource('companies', 'CompanyController');
        Route::resource('menus', 'MenuController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('services', 'ServiceController');
        Route::post('users/sendmail', 'UserController@sendMail')->name('send_email');
    });
    Route::get('register/recycle', 'Auth\RegisterController@companyRegister')->name('company_register');
    Route::get('register/person', 'Auth\RegisterController@personRegister')->name('person_register');

    Route::name('api.')->prefix('api')->namespace('Api')->group(function () {
        Route::resource('roles', 'RoleController')->only('index');
        Route::resource('permissions', 'PermissionController')->only('index');
        Route::resource('receptions', 'ReceptionController')->only('index', 'show');
        Route::resource('users', 'UserController')->only('store', 'update');
        Route::resource('places', 'PlaceController')->only('show');
        Route::resource('services', 'ServiceController')->only('index');
        Route::resource('employees', 'EmployeeController')->only('index');
    });
    Auth::routes();

});

Route::domain(config('app.url'))->group(function () {

    Route::get('/register', function () {
        return view('auth.join-site');
    });

    Route::name('api.')->prefix('api')->namespace('Api')->group(function () {
        Route::resource('roles', 'RoleController')->only('index');
        Route::resource('permissions', 'PermissionController')->only('index');
        Route::resource('receptions', 'ReceptionController')->only('index', 'show');
        Route::resource('users', 'UserController')->only('store', 'update');
        Route::resource('places', 'PlaceController')->only('show');
        Route::resource('services', 'ServiceController')->only('index');
        Route::resource('employees', 'EmployeeController')->only('index');
        Route::get('companies/filter', 'CompanyController@filter');
        Route::resource('companies', 'CompanyController');
        Route::get('owners', 'UserController@getOwners');
    });

    Route::name('front.')->namespace('Front')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('recycles', 'RecycleController')
             ->only('show');
        Route::resource('recycles.reviews', 'ReviewController');
        Route::get('rating', 'RateController@index')->name('rating');

        Route::get('/contacts', function () {
            return view('blank');
        })->name('contacts');

        Route::get('/about', function () {
            return view('blank');
        })->name('about');

        Route::get('/index', function () {
            return view('index');
        });

        Route::get('/{page}', function ($page) {
            if (view()->exists("frontend.$page")) {
                return view("frontend.$page");
            }

            abort(404);
        });
    });
});
