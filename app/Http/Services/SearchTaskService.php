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
                \App\Filters\ByCategories::class,
                \App\Filters\IsRemoteJob::class,
                \App\Filters\HasNoResponses::class,
                \App\Filters\ByTimePeriod::class,
                \App\Filters\ByName::class,
                \App\Filters\ByCityId::class,
                \App\Filters\BySingleCategory::class,
            ])
            ->thenReturn();
    }
}