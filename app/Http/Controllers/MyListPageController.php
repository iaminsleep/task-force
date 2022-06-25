<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;

use App\Http\Services\FilterProfileTasksService;

class MyListPageController extends Controller
{
    public function __invoke(FilterProfileTasksService $service)
    {
        $tasks = !count(request()->all())
            ? Task::where('user_id', auth()->user()->id)->orWhere('performer_id', auth()->user()->id)->get()
            : $service->execute()->get();

        return view('mylist.index', [ 'tasks' => $tasks ]);
    }
}
