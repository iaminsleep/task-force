<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {
        return view('landing');
    }

    public function allTasks() 
    {
        $tasks = Task::orderBy('created_at', 'ASC')->get();
        return view('browse', ['tasks' => $tasks]);
    }
}