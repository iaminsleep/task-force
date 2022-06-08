<?php

namespace App\Http\Services;

use App\Models\Response;

class AcceptResponse {
  public function execute(Response $response) {
    $task = $response->task;

    if($task->user_id === auth()->user()->id) {
        $task->fill([
            'performer_id' => $response->user_id,
            'budget' => $response->payment
        ])->save();

        return true;
    }

    return false;
  }
}
