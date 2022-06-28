<?php

namespace App\Http\Controllers;

use App\Models\Task;

class AccountPageController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        $notification_settings = [
            [
                'id' => 1,
                'name' => 'Новое сообщение',
                'value' => 'notify_messages'
            ],
            [
                'id' => 2,
                'name' => 'Действия по заданию',
                'value' => 'notify_tasks'
            ],
            [
                'id' => 3,
                'name' => 'Новый отзыв',
                'value' => 'notify_feedbacks'
            ],
        ];

        return view('account.index', [
            'user' => $user,
            'notification_settings' => $notification_settings
        ]);
    }
}
