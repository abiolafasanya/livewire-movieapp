<?php

use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SeriesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/movies', function () {
    return view('movies');
});

Route::get('/movie/info', function () {
    return view('livewire.movie-info');
})->name('movie/info');




Route::controller(MoviesController::class)->group(function () {
    Route::get('/', 'index')->name('movies');
    Route::get('/movie/{id}', 'getMovie')->name('movie');
    Route::get('test/{id}', 'tvSeries');
    Route::get('/casts/{id}', 'casts');
});

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series');
    Route::get('/series/{id}', 'show');
});

Route::controller(ActorController::class)->group(function () {
    Route::get('/actors', 'actors')->name('actors');
    Route::get('/actor/{id}', 'show');
});



//  Protected and authentication route

Route::group(['middleware' => [
    'auth:sanctum', 
    'verified'],
], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

