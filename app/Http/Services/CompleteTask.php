<?php

namespace App\Http\Services;

use App\Models\Task;
use App\Models\User;
use App\Models\Feedback;

use App\Notifications\UserNotification;

class CompleteTask {
  public function execute(array $data, $taskId) {
    $task = Task::findOrFail($taskId);

    if($task->performer_id) {
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

        $user->notify(new UserNotification([
            "message" => 'Завершено задание',
            "task_name" => $task->title,
            'task_id' => $task->id,
            "type" => 'close',
        ]));

        $user->save();
    }

    $task->status_id = $data['status'];

    $task->save();
  }
}
