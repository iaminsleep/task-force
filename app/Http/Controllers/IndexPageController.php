<?php

namespace App\Http\Controllers;

use App\Models\Task;

class IndexPageController extends Controller
{
    public function __invoke() 
    {
        $timezone = $_COOKIE['timezone'] ?? config('timezone');

        $tasks = Task::orderBy('id', 'DESC')->take(4)->get();
        
        return view('landing', [ 'tasks' => $tasks, 'timezone' => $timezone ]);
    }
}