<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;

use App\Http\Requests\SendMessageRequest;

class SendMessageController extends Controller
{
    /**
     * Persist message to database
     *
     * @param SendMessageRequest $request
     * @return Response
     */

    public function __invoke(SendMessageRequest $request, $taskId)
    {
        $message = new Message();
        $message->message = request()->message;
        $message->task_id = $taskId;
        $message->user_id = auth()->user()->id;

        $message->save();

        return response($message, 201);
    }
}
