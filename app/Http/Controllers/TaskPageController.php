<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use Carbon\Carbon;

use App\Http\Services\YaGeoService;
use App\Http\Services\GetTaskAmountDeclension;

class TaskPageController extends Controller
{
    public function __invoke($id, YaGeoService $service, GetTaskAmountDeclension $action) {
        $auth_user_id = Auth::user()->id ?? null;
        $task = Task::findOrFail($id);
        $timezone = $_COOKIE['timezone'];

        $time_difference = Carbon::parse($task->created_at)->diffForHumans();
        $time_on_website = str_replace('назад', 'на сайте', 
            Carbon::parse($task->user->created_at)
                ->shiftTimezone($timezone)
                ->diffForHumans()
        );
        $deadline = Carbon::parse($task->deadline)->format('d-m-Y');
        $city_name = $task->city->name;
        $city_address = $task->location;
        $coordinates = $service->getCoordinates($city_name, $city_address);
        $task_amount = $action->execute($task->user->tasks->count());  
        
        return view('task-page', 
        [
            'auth_user_id' => $auth_user_id,
            'task' => $task, 
            'time_difference' => $time_difference, 
            'deadline' => $deadline,
            'task_amount' => $task_amount,
            'time_on_website' => $time_on_website,
            'coordinates' => $coordinates,
        ]);
    }
}
