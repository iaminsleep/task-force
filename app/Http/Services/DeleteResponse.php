<?php

namespace App\Http\Services;

use App\Models\Response;

class DeleteResponse {
  public function execute(Response $response) {
    if($response->user_id === auth()->user()->id
    || $response->task->user_id === auth()->user()->id) {
        $response->delete();
        return true;
    }

    return false;
  }
}
