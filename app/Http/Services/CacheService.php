<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Cache;

class CacheService 
{
    public function exists(string $key) {
        return Cache::has($key);
    }

    public function getFromCache(string $key) {
        return Cache::get($key);
    }

    public function saveCache(string $key, $data, $expirationTime = 3600) {
        Cache::put($key, $data, $expirationTime);
    }
}