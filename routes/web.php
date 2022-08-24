<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AttendanceController,EmployeeController,OvertimeController,DeductionController,PositionController,PayrollController,ScheduleController};

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
});

//employee
Route::controller(EmployeeController::class)
->as('employee.')
->prefix('employee')
->group(function(){
    Route::get('/', 'index')->name('index');

    //empolyee schedule
    Route::get('/schedule', 'schedule')->name('schedule');

    Route::controller(OvertimeController::class)
    ->as('overtime.')
    ->prefix('overtime')
    ->group(function(){
        Route::get('/', 'index')->name('index');
    });
});

//deduction
Route::controller(DeductionController::class)
->as('deduction.')
->prefix('deduction')
->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::put('/update', 'update')->name('update');
    Route::delete('/destroy', 'destroy')->name('destroy');
});

//position
Route::controller(PositionController::class)
->as('position.')
->prefix('position')
->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/store', 'store')->name('store');
});

//payroll
Route::controller(PayrollController::class)
->as('payroll.')
->prefix('payroll')
->group(function(){
    Route::get('/','index')->name('index');
});

//schedule
Route::controller(ScheduleController::class)
->as('schedule.')
->prefix('schedule')
->group(function(){
    Route::get('/','index')->name('index');
});