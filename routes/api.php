<?php

use App\Http\Controllers\API\ActivitiesController;
use App\Http\Controllers\API\DisciplineActivitiesController;
use App\Http\Controllers\API\DisciplinesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'disciplines'], function () {
    Route::get('/', [DisciplinesController::class, 'index']);
    Route::post('/', [DisciplinesController::class, 'store']);
    Route::get('/{id}', [DisciplinesController::class, 'show']);
    Route::put('/{id}', [DisciplinesController::class, 'update']);
    Route::delete('/{id}', [DisciplinesController::class, 'destroy']);

    Route::get('/{id}/activities', [DisciplineActivitiesController::class, 'index']);
});

Route::group(['prefix' => 'activities'], function () {
    Route::get('/', [ActivitiesController::class, 'index']);
    Route::post('/', [ActivitiesController::class, 'store']);
    Route::get('/{id}', [ActivitiesController::class, 'show']);
    Route::put('/{id}', [ActivitiesController::class, 'update']);
    Route::delete('/{id}', [ActivitiesController::class, 'destroy']);
});
