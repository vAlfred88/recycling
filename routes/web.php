<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('my.' . config('app.url'))->group(function () {
    Auth::routes();
});

Route::get('/', function () {
    return view('welcome');
});
