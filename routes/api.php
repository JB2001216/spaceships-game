<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StarshipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('people', PersonController::class);
Route::resource('starships', StarshipController::class);
Route::resource('scores', ScoreController::class);
