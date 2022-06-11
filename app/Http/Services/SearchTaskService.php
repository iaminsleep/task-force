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
                \App\Filters\Tasks\ByCategories::class,
                \App\Filters\Tasks\IsRemoteJob::class,
                \App\Filters\Tasks\HasNoResponses::class,
                \App\Filters\Tasks\ByTimePeriod::class,
                \App\Filters\Tasks\ByName::class,
                \App\Filters\Tasks\ByCityId::class,
                \App\Filters\Tasks\BySingleCategory::class,
            ])
            ->thenReturn();
    }
}
