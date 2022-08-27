<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;

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


Route::get('/movie/{id}',[ MoviesController::class, 'getMovie'])->name('movie');

Route::get('/movies', [MoviesController::class, 'index']);




//  Protected and authentication route

Route::group(['middleware' => [
    'auth:sanctum', 
    'verified'],
], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

