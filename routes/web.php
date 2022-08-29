<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;

Route::controller(MoviesController::class)->group(function () {
    Route::get('/', 'index')->name('movies');
    Route::get('/movie/{id}', 'show')->name('movie');
});


Route::controller(ActorsController::class)->group(function () {
    Route::get('/actors', 'index')->name('actors');
    Route::get('/actor/{id}', 'show')->name('actor');
});


Route::controller(TvController::class)->group(function () {
    Route::get('/tv', 'index')->name('tv');
    Route::get('/tv/{id}', 'show')->name('tvshow');
});
