<?php

namespace App\Http\Services;

use App\Models\Feedback;

class CreateFeedbackService {
  public function execute(array $data, $taskId) : Feedback {
    $feedback = Feedback::create([
        'user_id' => auth()->user()->id,
        'task_id' => $taskId,
        'payment' => $data['payment'],
        'comment' => $data['comment'],
    ]);

    return $feedback;
  }
}
