<?php

namespace App\Http\Controllers;

use App\Models\Message;

class FetchMessagesController extends Controller
{
    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function __invoke($taskId)
    {
        return Message::with('user')->where('task_id', $taskId)->get();
    }
}
