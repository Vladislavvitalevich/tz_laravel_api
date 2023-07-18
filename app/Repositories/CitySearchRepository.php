<?php

namespace App\Repositories;

use App\Models\City;

class CitySearchRepository
{
    public function findByName( $name )
    {
        return City::where('name', $name)->first();
    }
}
