<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/test', ['uses' => "\App\Http\Controllers\TestController@index"]);


Route::group(['middleware' => ['auth:sanctum', 'verified'], 'namespace' => '\App\Http\Controllers'], function() {

    Route::get('/dashboard', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

    Route::group(['middleware' => [], 'namespace' => 'Panel'], function() {
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', RoleController::class);
        Route::resource('/test', RoleController::class);
    });
});

