<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\BusinessDayController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/holidays', HolidayController::class);
Route::get('/is-business-day', BusinessDayController::class);
