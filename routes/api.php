<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

Route::group([
    'prefix' => 'client'
], function(){
    Route::get('terrarios', 'TerrarioControler@index');
    Route::post('sensordata', 'TemperatureHumidityController@receiveDataFromQueue');
});

Broadcast::routes(['middleware' => ['cors']], function () {
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
