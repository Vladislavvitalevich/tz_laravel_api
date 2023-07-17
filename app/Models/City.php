<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'city_user', 'city_id', 'user_id');
    }

    public function weathers()
    {
        return $this->hasMany('App\Models\Weather');
    }
}