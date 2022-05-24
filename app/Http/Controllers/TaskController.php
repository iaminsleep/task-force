<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use App\Models\City;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function createPage()
    {
        return view('create');
    }

    public function show($id) {
        $task = Task::findOrFail($id);
        return view('task-page', ['task' => $task]);
    }

    public function create(Request $request) 
    {
        $validator = Validator::make($request->input(), [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            // 'lot-img' => 'required|mimes:png,jpeg',
            'location' => 'required',
            'budget' => 'required',
            'deadline' => 'required|date',
        ]);

        if($validator->fails()) {
            return redirect(route('create.show'))
            ->withErrors($validator)
            ->withInput();
        }

        $task = new Task();
        $task->name = request('name');
        $task->description = request('description');
        $task->category_id = request('category_id');
        $task->user_id = Auth::user()->id;
        $task->location = request('location');
        $task->budget = request('budget');
        $task->deadline = request('deadline');
        // $task->url = request()->file('lot-img')->store('img/lots');

        $task->save();

        return redirect(route('task.show', ['id' => $task->id]));
    }

    public function search(Request $request) {
        $categories = $request['category'];
        $is_remote = $request['remote_job'];
        $is_no_responses = $request['no_responses'];
        $period = $request['time'];
        $name = $request['name'];
        $city_id = $request['city_id'];

        if(is_null($categories) && is_null($is_remote) 
        && is_null($is_no_responses) && is_null($period) 
        && is_null($name) && is_null($city_id)) return redirect('/browse');
        
        $tasks = Task::all();
        
        $tasks = Task::when($categories, function($query, $categories) {
            return $query->whereIn('category_id', $categories);
        })->when($is_remote, function($query) {
            return $query->where('remote', 1);
        })->when($is_no_responses, function($query) {
            return $query->withCount('feedbacks')->having('feedbacks_count', '=', 0);
        })->when($period === "in_a_day", function($query) {
            return $query->where('deadline', '<=', Carbon::now()->addDay());
        })->when($period === "in_a_week", function($query) {
            return $query->where('deadline', '<=', Carbon::now()->addWeek());
        })->when($period === "in_a_month", function($query) {
            return $query->where('deadline', '<=', Carbon::now()->addMonth());
        })->when($name, function($query, $name) {
            return $query->where('title', 'LIKE', '%'.$name.'%');
        })->when($city_id, function($query, $city_id) {
            return $query->where('city_id', $city_id);
        });

        $tasks = $tasks->paginate(4);

        return view('search', ['tasks' => $tasks]);
    }
}
