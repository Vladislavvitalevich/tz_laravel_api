<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Get value from cache by key.
     *
     * @param  string  $key
     * @return mixed|null
     */
    public function get($key)
    {
        return Cache::get($key);
    }

    /**
     * Store value in cache.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @param  int|null  $minutes
     * @return void
     */
    public function put($key, $value, $minutes = null)
    {
        Cache::put($key, $value, $minutes);
    }

    /**
     * Check if the value is in the cache.
     *
     * @param  string  $key
     * @return bool
     */
    public function has($key)
    {
        return Cache::has($key);
    }

    /**
     * Delete value from cache by key.
     *
     * @param  string  $key
     * @return bool
     */
    public function forget($key)
    {
        return Cache::forget($key);
    }

    /**
     * Get value from cache by key.
     * If the value is missing, execute the specified closure and store the resulting value in the cache.
     *
     * @param  string  $key
     * @param  int|null  $minutes
     * @param  \Closure  $callback
     * @return mixed
     */
    public function remember($key, $minutes, \Closure $callback)
    {
        return Cache::remember($key, $minutes, $callback);
    }
}
