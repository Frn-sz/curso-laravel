<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/series/store', [SeriesController::class, 'store']);


Route::resource('/series', SeriesController::class);
