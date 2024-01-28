<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;


Route::resource('/series', SeriesController::class)->middleware(Authenticator::class);


Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'index'])->name('store');
