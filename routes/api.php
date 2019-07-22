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

    Route::apiResource('transfer', 'Api\TransferController');

    Route::apiResource('request', 'Api\RequestController')->except(['show']);
    Route::get('/request/recipient', 'Api\RequestController@recipient')->name('recipient');

    Route::get('/user/{cardID}', 'UserController@show');

    Route::apiResource('favorite', 'Api\FavoriteController')->only(['index', 'store', 'destroy']);
//    Route::get('favorite/{id}', 'Api\FavoriteController@show');

});
