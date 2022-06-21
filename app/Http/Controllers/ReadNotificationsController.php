<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Task;

use App\Http\Requests\SendMessageRequest;

use App\Notifications\UserNotification;

class ReadNotificationsController extends Controller
{
    public function __invoke() {
        auth()->user()->unreadNotifications->markAsRead();

        return back();
    }
}
