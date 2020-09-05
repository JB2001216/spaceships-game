<?php

use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::apiResource('people', PersonController::class);

Route::group(['prefix' => 'play', 'as' => 'play.'], function () {
    Route::post('people', [GameController::class, 'playRandomPeople'])->name('people');
    Route::post('starships', [GameController::class, 'playRandomStarships'])->name('starships');
});
