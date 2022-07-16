<?php

use App\Modules\Dashboard\Controllers\DashboardController;
use App\Modules\Registration\Controllers\RegistrationController;

Route::prefix('/')->middleware([])->namespace('App\Modules\Dashboard\Controllers')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/create', 'DashboardController@create');
    Route::get('/show/{id}', 'DashboardController@show');
    Route::get('/edit/{id}', 'DashboardController@edit');
    Route::get('/delete/{id}', 'DashboardController@destroy');
});

