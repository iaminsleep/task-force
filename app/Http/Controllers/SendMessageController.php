<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Task;

use App\Http\Requests\SendMessageRequest;

use App\Notifications\UserNotification;

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
        try {
            $task = Task::findOrFail($taskId);

            if($task->user_id === auth()->user()->id || $task->performer_id === auth()->user()->id) {
                $message = Message::create([
                    'message' => $request['message'],
                    'task_id' => $taskId,
                    'user_id' => auth()->user()->id,
                ]);

                $interlocutorId = auth()->user()->id === $task->user_id
                    ? $task->performer_id
                    : $task->user_id;

                User::find($interlocutorId)->notify(new UserNotification([
                    'message' => 'Новое сообщение в чате',
                    'task_name' => $task->title,
                    'task_id' => $task->id,
                    'type' => 'message',
                ]));

                return response($message, 201);
            }

            else return response(null, 401);
        }
        catch(ModelNotFoundException $exception) {
            return response(null, 404);
        }
    }
}
