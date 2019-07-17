<?php

use Illuminate\Http\Request;

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


Route::middleware('auth:api')->group(function () {

    Route::apiResource('transfer', 'Api\TransferController')->except(['index']);
    Route::get('transfer','Api\TransferController@index')->name('transfer');

    Route::get('/user/{cardID}', 'UserController@show');

    Route::apiResource('favorite', 'Api\FavoriteController')->except(['show','update']);

});
