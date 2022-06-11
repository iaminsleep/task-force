<?php

namespace App\Http\Services;

use App\Models\Message;

class ClearMessages {
  public function execute($taskId) {
    return Message::where('task_id', $taskId)->delete();
  }
}
