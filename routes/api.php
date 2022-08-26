<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::controller('users', 'UserController');
Route::controller(MoviesController::class)->group(function () {
    Route::get('/movies', 'index');
    Route::get('/test', 'movies');
    Route::get('/movie/{id}', 'getMovieApi');
    Route::get('/casts/{id}', 'casts');
});