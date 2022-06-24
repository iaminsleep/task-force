<?php

namespace App\Http\Services;

use App\Models\Task;

class UpdateTasksStatus
{
    public function __invoke()
    {
        Task::whereNull('status_id')
            ->whereDate('deadline', '<', today())
            ->update(['status_id' => 4]);

        info('Task status was updated.');
    }
}
