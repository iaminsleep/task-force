<?php

namespace App\Http\Services;

use App\Models\Task;
use App\Models\User;

use App\Notifications\UserNotification;

class RefuseTask {
  public function execute($taskId) {
    $task = Task::find($taskId);
    $user = User::find($task->performer_id);

    $newRating = $user->rating - $user->rating / 5;
    if($newRating < 1) $newRating = 1;

    $user->rating = $newRating;
    $task->performer_id = null;

    if(in_array(2, json_decode($task->user->notification_settings, true))) {
        $task->user->notify(new UserNotification([
            "message" => 'Исполнитель отказался от задания',
            "task_name" => $task->title,
            "task_id" => $task->id,
            "type" => 'refuse',
        ]));
    }

    $user->save();
    $task->save();
  }
}
