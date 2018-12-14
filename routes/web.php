<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('my.' . config('app.url'))->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('company.home');
    Route::get('company', function () {
        return view('companies.index');
    })->name('company.card');
    Auth::routes();
});

Route::get('/', function () {
    return view('welcome');
});
