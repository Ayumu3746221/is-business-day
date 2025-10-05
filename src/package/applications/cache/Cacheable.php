<?php

namespace App\Package\Applications\Cache;

use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    public function rememberCache(string $key, \Closure $callback, int $ttl = 60 * 60)
    {
        return Cache::remember($key, $ttl, $callback);
    }
}
