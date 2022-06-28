<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Http\Services\ClearTmpFolder;

class IndexPageController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::select([
            'id',
            'title',
            'description',
            'category_id',
            'budget',
            'created_at'])
        ->withCount('responses')
        ->orderBy('responses_count', 'DESC')
        ->take(4)
        ->get();

        return view('landing.index', [ 'tasks' => $tasks ]);
    }
}
