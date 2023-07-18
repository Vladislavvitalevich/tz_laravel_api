<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\City;
use App\Repositories\CitySearchRepository;

class WeatherService
{
     
    protected $citySearch;

    public function __construct(CitySearchRepository $citySearch)
    {
        $this->citySearch = $citySearch;
    }

    
    /**
      * Get weather from openweathermap api.
      *
      * @param  string  $city
      * @return array
      */
    public function get( $city ) 
    {
        $city = $this->citySearch->findByName( (string) $city);
        if (Cache::has($city ."_". $city->id)) {
            dd(Cache::get($city ."_". $city->id));
            return Cache::get($city ."_". $city->id);
        } else {
            $apiKey = env('OPENWEATHER_API_KEY');
        
            $client = new Client();
            
            $url = "http://api.openweathermap.org/data/2.5/weather?q=$city->name&appid=$apiKey";
            
            try {
                $response = $client->request('GET', $url);
                $data = json_decode($response->getBody(), true);
                
                if ($data['cod'] == 200) {
                    $weather = $data['weather'][0]['description'];
                    $temperature = $this->toCelsius( $data['main']['temp'] );
                    $humidity = $data['main']['humidity'];
                    $windSpeed = $data['wind']['speed'];
                    
                    // Add to Cache
                    Cache::put($city ."_". $city->id, [
                        'city' => $city->name,
                        'weather' => $weather, 
                        'temperature' => $temperature, 
                        'humidity' => $humidity, 
                        'wind_speed' => $windSpeed,
                    ], Carbon::now()->addMinutes(60));

                    dd([
                        'city' => $city->name,
                        'weather' => $weather,
                        'temperature' => $temperature,
                        'humidity' => $humidity,
                        'wind_speed' => $windSpeed,
                    ]);

                    return response()->json([
                        'city' => $city->name,
                        'weather' => $weather,
                        'temperature' => $temperature,
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

        
    }

    /**
      * Convert to celsius
      *
      * @param  float  $temp
      * @return float
      */
    public function toCelsius( $temp ) 
    {
        $celsium = $temp - 273.15;
        
        return round($celsium, 2);  
    }
}