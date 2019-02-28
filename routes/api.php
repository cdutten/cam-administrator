<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/cameras', 'CameraController@index');
Route::get('/cameras/{camera}', 'CameraController@show');
Route::post('/cameras', 'CameraController@store');
