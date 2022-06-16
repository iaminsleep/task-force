<?php

namespace App\Filters\Tasks;

class ByTaskCity
{
    public function handle($query, $next)
    {
        if(request()->has('city_id')) {
            $query->where('city_id', request()->city_id);
        }

        return $next($query);
    }
}
