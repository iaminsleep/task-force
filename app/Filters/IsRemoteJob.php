<?php

namespace App\Filters;

class IsRemoteJob
{
    public function handle($query, $next)
    {
        if(request()->has('remote_job')) {
            $query->where('remote', 1);
        }

        return $next($query);
    }
}