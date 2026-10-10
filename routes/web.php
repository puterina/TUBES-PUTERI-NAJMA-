<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('housekeepers', \App\Http\Controllers\HousekeeperController::class)->except('show');