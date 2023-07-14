<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{

    public function getWeather( $city ) 
    {
        $apiKey = 'd7cfd266662bc7e3712d602e2d53c277';

        $client = new Client();

        $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

        try {
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody(), true);

            if ($data['cod'] == 200) {
                $weather = $data['weather'][0]['description'];
                $temperature = $data['main']['temp'];
                $humidity = $data['main']['humidity'];
                $windSpeed = $data['wind']['speed'];

                return response()->json([
                    'city' => $city,
                    'weather' => $weather,
                    'temperature' => $this->toCelsius($temperature),
                    'humidity' => $humidity,
                    'wind_speed' => $windSpeed,
                ], 200);
            } else {
                return response()->json(['error' => 'Failed to fetch weather data.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to connect to the weather API.'], 500);
        }
    }

    public function toCelsius( $temp ) 
    {
        $celsium = $temp - 273.15;
        
        return round($celsium, 2);  
    }
}
