<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'class'], function () {
    Route::get('/', 'ClassController@index');
    Route::get('/{id}', 'ClassController@show');
});
Route::group(['prefix' => 'discipline'], function () {

    Route::post('/', 'DisciplineController@create');
    Route::put('/', 'DisciplineController@update');
    Route::get('/', 'DisciplineController@list');
    Route::get('/{id}', 'DisciplineController@get');

    Route::get('/{id}/classes', "DisciplineClassesController@listClasses");
    
});
