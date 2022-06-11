<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;

use App\Http\Services\RefuseTask;
use App\Http\Services\ClearMessages;

class RefuseTaskController extends Controller
{
    public function __invoke($taskId, RefuseTask $service, ClearMessages $clearMessages) {
        $service->execute($taskId);

        $clearMessages->execute($taskId);

        return back();
    }
}
