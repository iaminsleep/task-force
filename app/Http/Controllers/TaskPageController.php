<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use App\Models\File;

use Carbon\Carbon;

use App\Http\Services\YaGeoService;
use App\Http\Services\GetTaskAmountDeclension;

class TaskPageController extends Controller
{
    public function __invoke($id, YaGeoService $service, GetTaskAmountDeclension $action) {
        $auth_user_id = Auth::user()->id ?? null; //get user id

        $task = Task::findOrFail($id); //get task info

        $timezone = $_COOKIE['timezone'] ?? config('timezone'); //get timezone from cookie, otherwise use config value

        $time_difference = Carbon::parse($task->created_at)->shiftTimezone($timezone)->diffForHumans(); //get time difference between current date and the date when this task was created

        $time_on_website = str_replace('назад', 'на сайте',
            Carbon::parse($task->user->created_at)
                ->shiftTimezone($timezone)
                ->diffForHumans()
        ); //get the info about how long user is on the website

        $deadline = Carbon::parse($task->deadline)->format('d-m-Y'); //get deadline date

        if($task->location) {
            $city_name = $task->city->name;
            $city_address = $task->location;
            $coordinates = $service->getCoordinates($city_name, $city_address); //get precise coordiantes from YMaps
        } else {
            $coordinates = null;
        }

        $task_amount = $action->execute($task->user->tasks->count()); // get the task amount that user created by himself

        $files = $task->files; //get files that user attached to the task

        return view('task-page',
        [
            'auth_user_id' => $auth_user_id,
            'task' => $task,
            'time_difference' => $time_difference,
            'deadline' => $deadline,
            'task_amount' => $task_amount,
            'time_on_website' => $time_on_website,
            'coordinates' => $coordinates,
            'files' => $files,
        ]);
    }
}
