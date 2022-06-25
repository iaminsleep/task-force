<?php

namespace App\Http\Services;

use App\Models\Task;

class UpdateTasksStatus
{
    public function __invoke()
    {
        Task::where('status_id', 1)
            ->whereDate('deadline', '<', today())
            ->update(['status_id' => 4]);

        info('Task status was updated.');
    }
}
