<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Task;

class FetchMessagesController extends Controller
{
    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function __invoke($taskId)
    {
        $task = Task::findOrFail($taskId);

        if($task->user_id === auth()->user()->id || $task->performer_id === auth()->user()->id) {
            return Message::where('task_id', $taskId)->get();
        }

        else return back();
    }
}
