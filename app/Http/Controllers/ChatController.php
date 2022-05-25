<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages($taskId)
    {
        return Message::with('user')->where('task_id', $taskId)->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */

    public function sendMessage(Request $request, $taskId)
    {
        $message = new Message();
        $message->message = $request['message'];
        $message->task_id = $taskId;
        $message->user_id = Auth::user()->id;

        $message->save();

        return response($message, 201);
    }
}
