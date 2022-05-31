<?php

namespace App\Http\Controllers;

use App\Models\Task;

class BrowseTasksController extends Controller
{
    public function __invoke() 
    {
        $tasks = Task::withCount('feedbacks')->orderBy('feedbacks_count', 'DESC')->paginate(4);

        $optional_filters = [
            [
                'name' => 'Без откликов',
                'alias' => 'no_responses'
            ],
            [
                'name' => 'Удалённая работа',
                'alias' => 'remote_job',
            ],
        ];
        
        $time_filters = [
            [
                'name' => 'За день',
                'alias' => 'in_a_day'
            ],
            [
                'name' => 'За неделю',
                'alias' => 'in_a_week',
            ],
            [
                'name' => 'За месяц',
                'alias' => 'in_a_month',
            ],
        ];
        
        return view('browse', [
            'tasks' => $tasks, 
            'optional_filters' => $optional_filters, 
            'time_filters' => $time_filters,
        ]);
    }
}