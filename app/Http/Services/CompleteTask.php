<?php

namespace App\Http\Services;

use App\Models\Task;
use App\Models\User;
use App\Models\Feedback;

class CompleteTask {
  public function execute(array $data, $taskId) {
    $task = Task::findOrFail($taskId);
    $user = User::findOrFail($task->performer_id);

    Feedback::create([
        'task_id' => $task->id,
        'author_id' => $task->user_id,
        'receiver_id' => $task->performer_id,
        'comment' => $data['comment'],
        'rating' => $data['rating'],
    ]);

    $newRating = ($user->rating + $data['rating']) / 2;
    if($newRating > 5) $newRating = 5;
    else if($newRating < 1) $newRating = 1;

    $user->rating = $newRating;
    $task->status = $data['status'];

    $task->save();
    $user->save();
  }
}
