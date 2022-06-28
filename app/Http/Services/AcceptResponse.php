<?php

namespace App\Http\Services;

use App\Models\Response;

use App\Http\Services\DeleteResponse;

use App\Notifications\UserNotification;

class AcceptResponse {
  public function execute(Response $response) {
    $task = $response->task;

    if($task->user_id === auth()->user()->id) {
        $task->fill([
            'performer_id' => $response->user_id,
            'budget' => $response->payment
        ])->save();

        $deleteResponse = new DeleteResponse;
        $deleteResponse->execute($response);

        foreach($task->responses as $response) {
            if(in_array(2, json_decode($response->user->notification_settings, true))) {
                $response->user->notify(new UserNotification([
                    "message" => 'Выбран исполнитель для',
                    "task_name" => $task->title,
                    'task_id' => $task->id,
                    "type" => 'executor',
                ]));
            }
        }

        return true;
    }

    return false;
  }
}
