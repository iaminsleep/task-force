<?php

namespace App\Http\Services;

use App\Models\Task;
use App\Models\User;

class RefuseTask {
  public function execute($taskId) {
    $task = Task::find($taskId);
    $user = User::find($task->performer_id);

    $newRating = $user->rating - $user->rating / 5;
    if($newRating < 1) $newRating = 1;

    $user->rating = $newRating;
    $task->performer_id = null;

    $user->save();
    $task->save();
  }
}
