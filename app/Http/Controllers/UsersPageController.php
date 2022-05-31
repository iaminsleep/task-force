<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersPageController extends Controller
{
    public function __invoke() 
    {
        $users = User::all();
        
        return view('users', [ 'users' => $users ]);
    }
}