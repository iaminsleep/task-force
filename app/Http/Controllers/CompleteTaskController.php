<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompleteTaskRequest;

use App\Http\Services\CompleteTask;
use App\Http\Services\ClearMessages;

class CompleteTaskController extends Controller
{
    public function __invoke($taskId, CompleteTaskRequest $request, CompleteTask $service, ClearMessages $clearMessages) {
        $service->execute($request->validated(), $taskId);

        $clearMessages->execute($taskId);

        return redirect(route('browse.page'));
    }
}
