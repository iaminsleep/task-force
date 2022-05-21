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
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */

    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->message = request('message');
        $message->task_id = request('task_id');
        $message->user_id = Auth::user()->id;

        $message->save();

        return ['status' => 'Message Sent!'];
    }
}
