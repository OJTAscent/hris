<?php


// use App\Http\Controllers\RoleController;
use App\Models\Registration;

use App\Modules\Registration\Controllers\RegistrationController;
use App\Modules\Registration\Controllers\RoleController;


// Route::prefix('/registration')->middleware([])->namespace('App\Modules\Registration\Controllers')->group(function () {

Route::prefix('/registration')->name('registration.')->controller(RegistrationController::class)->group(function () {
    Route::get('/' , 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/show/{id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'destroy')->name('delete');
});


    Route::prefix('/role')->name('role.')->controller(RoleController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        });




