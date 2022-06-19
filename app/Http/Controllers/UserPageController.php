<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;

class UserPageController extends Controller
{
    public function __invoke($id)
    {
        $user = User::findOrFail($id);
        $receivedFeedbacks = $user->received_feedbacks;
        $completedTasksCount = Task::where('performer_id', $user->id)->where('status', 2)->count();

        return view('user-profile', [
            'user' => $user,
            'receivedFeedbacks' => $receivedFeedbacks,
            'completedTasksCount' => $completedTasksCount
        ]);
    }
}
