<?php

namespace App\Filters;
use Carbon\Carbon;

class ByTimePeriod
{
    public function handle($query, $next)
    {
        if(request()->has('time')) {
            $period = request()->time;

            $filterDate = Carbon::now();

            if($period === "in_a_day") $date = $filterDate->addDay();
            if($period === "in_a_week") $date = $filterDate->addWeek();
            if($period === "in_a_month") $date = $filterDate->addMonth();

            $query->where('deadline', '<=', $filterDate);
        }
        
        return $next($query);
    }
}