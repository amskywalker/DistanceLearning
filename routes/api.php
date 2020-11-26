<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplinesController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\DisciplineActivitiesController;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

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
