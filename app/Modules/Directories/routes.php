<?php

// use App\Modules\Directories\Controllers\DepartmentsController;
// use App\Modules\Directories\Controllers\RolesController;
// use App\Modules\Directories\Controllers\WorkingTypesController;

Route::prefix('/directories')->middleware([])->namespace('App\Modules\Directories\Controllers')->group(function () {
    Route::name('departments.')->prefix('/departments')->controller(DepartmentsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create');
        Route::get('/show/{id}', 'show');
        Route::get('/edit/{id}', 'edit');
        Route::get('/delete/{id}', 'destroy');
    });

    Route::name('roles.')->prefix('/roles')->controller(RolesController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });

    Route::name('workingtypes.')->prefix('/workingtypes')->controller(WorkingTypesController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create');
        Route::get('/show/{id}', 'show');
        Route::get('/edit/{id}', 'edit');
        Route::get('/delete/{id}', 'destroy');
    });

});
