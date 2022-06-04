<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedbackRequest;
use App\Http\Services\CreateFeedbackService;

class CreateFeedbackController extends Controller
{
    public function __invoke(CreateFeedbackRequest $request, CreateFeedbackService $service, $taskId)
    {
        $feedback = $service->execute($request->validated(), $taskId);

        return redirect(route('task.page', ['id' => $taskId]));
    }
}
