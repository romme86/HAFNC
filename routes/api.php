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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Subscribers', 'prefix' => '/subscribers'], function(){
    Route::get('/',['as' => 'subscribers', 'uses' => 'SubscriberController@index']);
    Route::get('/{article}',['as' => 'subscribers.show', 'uses' => 'SubscriberController@show']);
    Route::put('/',['as' => 'subscriber.store', 'uses' => 'SubscriberController@store']);
    Route::delete('/{article}',['as' => 'subscriber.delete', 'uses' => 'SubscriberController@destroy']);
    Route::post('/{article}',['as' => 'subscriber.update', 'uses' => 'SubscriberController@update']);
});