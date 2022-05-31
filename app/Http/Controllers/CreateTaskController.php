<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Services\CreateTaskService;

class CreateTaskController extends Controller
{
    public function __invoke(CreateTaskRequest $request, CreateTaskService $service) 
    {
        $task = $service->execute($request->validated());

        return redirect(route('task.page', ['id' => $task->id]));
    }
}
