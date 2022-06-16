<?php

namespace App\Http\Services;

use Illuminate\Pipeline\Pipeline;

use App\Models\Task;

class SearchTaskService
{
    public function execute()
    {
        $query = Task::query();

        return app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Filters\Tasks\ByTaskCategories::class,
                \App\Filters\Tasks\ByTaskRemoteJob::class,
                \App\Filters\Tasks\ByTaskNoResponses::class,
                \App\Filters\Tasks\ByTaskTimePeriod::class,
                \App\Filters\Tasks\ByTaskName::class,
                \App\Filters\Tasks\ByTaskCity::class,
                \App\Filters\Tasks\ByTaskCategory::class,
            ])
            ->thenReturn();
    }
}
