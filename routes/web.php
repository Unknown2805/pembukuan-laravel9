<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;

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
    return view('auth.login');
});

Auth::routes();


Route::controller(App\Http\Controllers\DashboardController::class)
->prefix('/dashboard')
    ->group(function(){
        Route::get('/','index');
        });

Route::controller(App\Http\Controllers\RekapController::class)
->prefix('/rekap')
    ->group(function(){
        Route::get('/','index');
        Route::get('/pdf','pdf');
        });

Route::controller(App\Http\Controllers\MasukController::class)
->prefix('/masuk')
    ->group(function(){
        Route::get('/','index');
        Route::get('/pdf','pdf');
        Route::post('/add','store');
        Route::put('/edit/{id}','edit');
        Route::delete('/delete/{id}','destroy');
        });

Route::controller(App\Http\Controllers\KeluarController::class)
->prefix('/keluar')
    ->group(function(){
        Route::get('/','index');
        Route::get('/pdf','pdf');
        Route::post('/add','store');
        Route::put('/edit/{id}','edit');
        Route::delete('/delete/{id}','destroy');
        });