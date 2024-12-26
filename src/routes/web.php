<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StampController;
use App\Http\Controllers\AttendanceController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [StampController::class, 'viewStamp']);
    Route::get('/work_start', [StampController::class, 'workStart']);
    Route::get('/work_finish', [StampController::class, 'workFinish']);
    Route::get('/break_start', [StampController::class, 'breakStart']);
    Route::get('/break_finish', [StampController::class, 'breakFinish']);
    Route::get('/attendance/{date?}', [AttendanceController::class, 'viewAttendance']);
});