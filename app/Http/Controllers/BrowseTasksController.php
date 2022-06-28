<?php

namespace App\Http\Controllers;

use App\Models\Task;

class BrowseTasksController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::orderBy('status_id', 'ASC')
            ->orderBy('created_at', 'DESC')
            ->select([
                'id',
                'title',
                'description',
                'category_id',
                'city_id',
                'location',
                'budget',
                'created_at'
            ])->paginate(4);

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
                'name' => 'В течении дня',
                'alias' => 'in_a_day'
            ],
            [
                'name' => 'В течении недели',
                'alias' => 'in_a_week',
            ],
            [
                'name' => 'В течении месяца',
                'alias' => 'in_a_month',
            ],
        ];

        return view('browse.index', [
            'tasks' => $tasks,
            'optional_filters' => $optional_filters,
            'time_filters' => $time_filters,
        ]);
    }
}
