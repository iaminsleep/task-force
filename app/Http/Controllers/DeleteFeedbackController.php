<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class DeleteFeedbackController extends Controller
{
    public function __invoke($feedbackId)
    {
        $feedback = Feedback::findOrFail($feedbackId);

        $feedback->delete();

        return redirect(route('task.page', ['id' => $feedback->task->id]));
    }
}
