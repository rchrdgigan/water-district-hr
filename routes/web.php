<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AttendanceController,EmployeeController,OvertimeController};

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 //attendance
 Route::controller(AttendanceController::class)
 ->as('attendance.')
 ->prefix('attendance')
 ->group(function(){
     Route::get('/', 'index')->name('index');
     Route::get('/create', 'create')->name('create');
     Route::post('/store', 'store')->name('store');
     Route::get('/edit/{id}', 'edit')->name('edit');
     Route::put('/update/{id}', 'update')->name('update');
 });

 //employee
 Route::controller(EmployeeController::class)
 ->as('employee.')
 ->prefix('employee')
 ->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/schedule', 'schedule')->name('schedule');
    Route::get('/create', '/create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('edit');
    Route::controller(OvertimeController::class)
    ->as('overtime.')
    ->prefix('overtime')
    ->group(function(){
        Route::get('/', 'index')->name('index');
    });
 });