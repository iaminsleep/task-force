<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Message;

use Carbon\Carbon;

use App\Http\Services\YaGeoService;
use App\Http\Services\GetTaskAmountDeclension;

class TaskPageController extends Controller
{
    public function __invoke($id, YaGeoService $service, GetTaskAmountDeclension $action) {
        $task = Task::findOrFail($id);

        if($task->messages)
            Message::with('task')->whereNull('read_at')->update(['read_at' => Carbon::now()]);

        $deadline = Carbon::parse($task->deadline)->format('d.m.Y');

        $coordinates = $task->location ?
            $service->getCoordinates($task->city->name, $task->location)
            : null;

        $task_amount = $action->execute($task->user->tasks()->count());

        $performer = User::whereId($task->performer_id)->first() ?? null;

        return view('task-page',
        [
            'task' => $task,
            'deadline' => $deadline,
            'task_amount' => $task_amount,
            'coordinates' => $coordinates,
            'performer' => $performer,
        ]);
    }
}
