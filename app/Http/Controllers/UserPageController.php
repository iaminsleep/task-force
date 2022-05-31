<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserPageController extends Controller
{
    public function __invoke($id) 
    {
        $user = User::findOrFail($id);
        
        return view('user', [ 'user' => $user ]);
    }
}