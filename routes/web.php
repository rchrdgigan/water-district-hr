<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,AttendanceController,EmployeeController,OvertimeController,PayrollController};

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
Route::post('/store/attendance', [AttendanceController::class, 'storeAttendance'])->name('store.attendance');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    //attendance
    Route::controller(AttendanceController::class)
    ->as('attendance.')
    ->prefix('attendance')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/search', 'search')->name('search');
        Route::post('/store', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::delete('/destroy', 'destroy')->name('destroy');
    });

    //employee
    Route::controller(EmployeeController::class)
    ->as('employee.')
    ->prefix('employee')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/image/update', 'updateImage')->name('update.image');
        Route::put('/update', 'update')->name('update');
        Route::delete('/destroy', 'destroy')->name('destroy');

        //empolyee schedule
        Route::get('/schedule', 'schedule')->name('schedule');
        Route::put('/update/schedule', 'updateSchedule')->name('update.schedule');

        Route::controller(OvertimeController::class)
        ->as('overtime.')
        ->prefix('overtime')
        ->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::put('/update', 'update')->name('update');
            Route::delete('/destroy', 'destroy')->name('destroy');
        });
    });

    //payroll
    Route::controller(PayrollController::class)
    ->as('payroll.')
    ->prefix('payroll')
    ->group(function(){
        Route::get('/','index')->name('index');
    });
});