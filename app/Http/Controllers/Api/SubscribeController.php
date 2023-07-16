<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Http\Controllers\Controller;
use App\Service\EmailService;

class SubscribeController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService) {
        $this->emailService = $emailService;
    }

    public function subscribe_city(User $user, City $city)
    {
        try {
            $user->cities()->save($city);
            $this->emailService->send(
                $user->email, 
                'You subscribed to the weather in the city of ' . $city->name, 'emails.subscribe', 
                [
                    'user_name' => $user->name,
                    'city_name' => $city_name
                ]);
            
            return response()->json('You have successfully subscribed to follow the weather in ' . $city->name, 200);
        } catch (\Throwable $th) {
            return response()->json('Assignment operation failed! Error: ' . $th, 500);
        }
    }

    /**
     * Subscribe subscribed to follow the weather in city.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribe($cities_id, $user_id) 
    {
        // 
    }
}
