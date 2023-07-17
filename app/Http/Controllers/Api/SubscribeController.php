<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscribeEmail;
use App\Mail\UnsubscribeEmail;


class SubscribeController extends Controller
{

    public function subscribe(User $user, City $city)
    {
        try {
            $city->users()->attach($user);
            
            $data = [
                "city_name" =>  $city->name,
                "user_name" =>  $user->name,
            ];

            Mail::to($user->email)->queue(new SubscribeEmail($data));
            
            return response()->json('You have successfully subscribed to follow the weather in ' . $city->name, 200);
        } catch (\Throwable $th) {
            return response()->json('Assignment operation failed! Error: ' . $th, 500);
        }
    }

    /**
     * Subscribe subscribed to follow the weather in city.
     */
    public function unsubscribe(User $user, City $city) 
    {
        try {
            $user->cities()->detach($city);

            $data = [
                "city_name" =>  $city->name,
                "user_name" =>  $user->name,
            ];

            Mail::to($user->email)->queue(new UnsubscribeEmail($data));
            
            return response()->json('You have successfully unsubscribed to follow the weather in ' . $city->name, 200);
        } catch (\Throwable $th) {
            return response()->json('Assignment operation failed! Error: ' . $th, 500);
        }
    }
}
