<?php

namespace App\Http\Adapters\Cache;

use Illuminate\Support\Facades\Cache;

use App\Http\Protocols\Cache as CacheAdapterProtocol;

class IlluminateCacheAdapter implements CacheAdapterProtocol
{
    public function exists(string $key) {
        return Cache::has($key);
    }

    public function get(string $key) {
        return Cache::get($key);
    }

    public function save(string $key, $data, int $expirationTime = 3600) {
        Cache::put($key, $data, $expirationTime);
    }
}