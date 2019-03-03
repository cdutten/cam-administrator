<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/** Camera endpoints */
Route::get('/cameras', 'CamerasController@index');
Route::get('/cameras/{camera}', 'CamerasController@show');
Route::post('/cameras', 'CamerasController@store');
Route::delete('/cameras/{camera}', 'CamerasController@destroy');
Route::patch('/cameras/{camera}', 'CamerasController@update');


/** Location endpoints */
Route::get('/locations', 'LocationsController@index');
Route::get('/locations/{location}', 'LocationsController@show');
Route::post('/locations', 'LocationsController@store');
Route::patch('/locations/{location}', 'LocationsController@update');
Route::delete('/locations/{location}', 'LocationsController@destroy');
