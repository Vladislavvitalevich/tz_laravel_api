<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        Route::get('/weather/{city}', 'Api\WeatherController@getWeather');
        // Route::get('/subscribe', 'Api\SubscribeController@subscribe_city');
    });
});
Route::get('/cities', 'Api\CityController@index');

Route::get('/sub/{user}/{city}', 'Api\SubscribeController@subscribe_city');

