<?php


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

    Route::post('/send', function (\Illuminate\Http\Request $request) {
        return '1';
        if (\Illuminate\Support\Facades\Auth::id() == $request->recipient_id)
            return response("You can't send to yourself!", 405);
//        return response()->json($_GET['recipient_id']);
        $transfer = new \App\Transfer($request->all());
        $transfer->sender_id = \Illuminate\Support\Facades\Auth::id();
        $transfer->save();
        return response()->json($transfer, 200);
    });

});