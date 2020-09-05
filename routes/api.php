<?php

use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\StarshipController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::resource('people', PersonController::class);
Route::resource('starships', StarshipController::class);
Route::resource('scores', ScoreController::class);
Route::group(['prefix' => 'play', 'as' => 'play.'], function () {
    Route::post('people', [GameController::class, 'playRandomPeople'])->name('people');
    Route::post('starships', [GameController::class, 'playRandomStarships'])->name('starships');
});
