<?php

namespace App\Http\Controllers;

use App\Models\Task;

class MyListPageController extends Controller
{
    public function __invoke() 
    {
        $user = auth()->user();
        
        return view('mylist', [ 'user' => $user ]);
    }
}