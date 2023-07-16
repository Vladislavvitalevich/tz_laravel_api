<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
