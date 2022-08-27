<?php

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

Route::get('/', function () {
    return view('movies');
})->name('movies');

Route::get('/movie/info', function () {
    return view('livewire.movie-info');
})->name('movie/info');




Route::controller('movies', MoviesController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'getMovie')->name('movie');
});

Route::controller('tv', SeriesController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
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

