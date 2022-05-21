<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use App\Models\City;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
}
