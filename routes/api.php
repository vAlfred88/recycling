<?php

use Illuminate\Support\Facades\Route;

Route::domain('my.' . config('app.url'))->group(function () {
    Route::namespace('Api')->group(function () {

    });
});
