<?php

namespace App\Http\Services;

use App\Models\Task;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CreateTaskService {
  public function execute(array $data) : Task {
    $task = new Task();
    $task->name = $data['name'];
    $task->description = $data['description'];
    $task->category_id = $data['category_id'];
    $task->user_id = Auth::user()->id;
    $task->location = $data['location'];
    $task->budget = $data['budget'];
    $task->deadline = $data['deadline'];
    $task->created_at = Carbon::now();

    $task->save();

    return $task;
  }
}
