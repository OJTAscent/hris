<?php 

use Illuminate\Support\Facades\Route;
use App\Models\Performance;
use Illuminate\Http\Request;

Route::prefix('performance')->middleware([])->namespace('App\Modules\Performance\Controllers')->group(function () {
        Route::prefix('/')->name('performance.')->controller(PerformanceController::class)->group(function() {
                Route::get('/' , 'index')->name('index');
                Route::get('/create' , 'create')->name('create');
                Route::post('/store' , 'store')->name('store');
                Route::get('/show/{id}' , 'show')->name('show');
                Route::get('/edit/{id}' , 'edit')->name('edit');
                Route::put('/update/{id}' , 'update')->name('update');
                Route::get('/delete/{id}' , 'destroy')->name('delete');
        });
 
});

// Route::prefix('performance_summary')->middleware([])->namespace('App\Modules\Performance\Controllers')->group(function () {
//         Route::prefix('/')->name('performance_summary.')->controller(PerformanceSummaryController::class)->group(function() {
//                 Route::get('/' , 'index')->name('index');
//                 Route::get('/create' , 'create')->name('create');
//                 Route::post('/store' , 'store')->name('store');
//                 Route::get('/show{id}' , 'show')->name('show');
//                 Route::get('/edit/{id}' , 'edit')->name('edit');
//                 Route::put('/update/{id}' , 'update')->name('update');
//                 Route::get('/delete/{id}' , 'destroy')->name('delete');
//         });
// });

// Route::prefix('performance_goal')->middleware([])->namespace('App\Modules\Performance\Controllers')->group(function () {
//         Route::prefix('/')->name('performance_goal.')->controller(PerformanceGoalController::class)->group(function() {
//                 Route::get('/' , 'index')->name('index');
//                 Route::get('/create' , 'create')->name('create');
//                 Route::post('/store' , 'store')->name('store');
//                 Route::get('/show{id}' , 'show')->name('show');
//                 Route::get('/edit/{id}' , 'edit')->name('edit');
//                 Route::put('/update/{id}' , 'update')->name('update');
//                 Route::get('/delete/{id}' , 'destroy')->name('delete');
//         });
// });

// Route::prefix('performance_competencies')->middleware([])->namespace('App\Modules\Performance\Controllers')->group(function () {
//         Route::prefix('/')->name('performance_competencies.')->controller(PerformanceCompetenciesController::class)->group(function() {
//                 Route::get('/' , 'index')->name('index');
//                 Route::get('/create' , 'create')->name('create');
//                 Route::post('/store' , 'store')->name('store');
//                 Route::get('/show{id}' , 'show')->name('show');
//                 Route::get('/edit/{id}' , 'edit')->name('edit');
//                 Route::put('/update/{id}' , 'update')->name('update');
//                 Route::get('/delete/{id}' , 'destroy')->name('delete');
//         });
// });

