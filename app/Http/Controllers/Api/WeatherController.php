<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WeatherService;
use App\Models\City;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct( WeatherService $weatherService )
    {
        $this->weatherService = $weatherService;
    }

    /*
    * Get weather information for a specific city.
    *
    * @param string $city_name The name of the city.
    * @return Response
    */
    public function getWeather( $city_name ) 
    {
        return $this->weatherService->get( $city_name );
    }
}
