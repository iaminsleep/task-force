<?php

namespace App\Filters;

class ByCategories
{
    public function handle($query, $next)
    {
        if(request()->has('category')) {
            $query->whereIn('category_id', request()->category);
        }
        
        return $next($query);
    }
}