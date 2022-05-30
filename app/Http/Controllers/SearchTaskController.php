<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Http\Services\SearchTaskService;

class SearchTaskController extends Controller
{
    public function __invoke(SearchTaskService $service) {
        $searchParameters = request()->all();

        if (empty(array_filter($searchParameters, function ($searchParam) { 
            return $searchParam !== null;
        }))) {
            return redirect('/browse');
        } else {
            $tasks = $service->execute();
            $tasks = $tasks->paginate(4);
        }
        
        return view('search', ['tasks' => $tasks]);
    }
}
