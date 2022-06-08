<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResponseRequest;
use App\Http\Services\CreateResponseService;

class CreateResponseController extends Controller
{
    public function __invoke(CreateResponseRequest $request, CreateResponseService $service, $taskId)
    {
        $service->execute($request->validated(), $taskId);

        return redirect(route('task.page', ['id' => $taskId]));
    }
}
