<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubscribeController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\WeatherController;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
        'middleware' => 'auth:api'
    ], function() {
        // Get weather by city name
        Route::get('/city/{city}/weather', [WeatherController::class, 'getWeather']);

        // Get all city name
        Route::post('/cities', [CityController::class, 'index']);

        // Subscribe to folow weather
        Route::get('/sub/{user}/{city}', [SubscribeController::class, 'subscribe']);
        // Unsubscribe ...
        Route::post('/unsub/{user}/{city}', [SubscribeController::class, 'unsubscribe']);
});
