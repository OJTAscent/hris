<?php

use App\Models\Survey;
use App\Modules\Survey\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

// Route::prefix('/registration')->middleware([])->namespace('App\Modules\Registration\Controllers')->group(function () {

    Route::prefix('/survey')->name('survey.')->controller(SurveyController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/show/{id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'destroy')->name('delete');
    });
