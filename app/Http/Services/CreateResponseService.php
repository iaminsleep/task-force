<?php

namespace App\Http\Services;

use App\Models\Response;
use App\Models\Task;

use App\Notifications\UserNotification;

class CreateResponseService {
  public function execute(array $data, $taskId) : Response {

    $response = Response::create([
        'user_id' => auth()->user()->id,
        'task_id' => $taskId,
        'payment' => $data['payment'],
        'comment' => $data['comment'],
    ]);

    $task = Task::find($taskId);
    if(in_array(3, json_decode($task->user->notification_settings, true))) {
        $task->user->notify(new UserNotification([
            "message" => 'Оставлен отклик к заданию',
            "task_name" => $task->title,
            'task_id' => $task->id,
            "type" => 'response',
        ]));
    }

    return $response;
  }
}
