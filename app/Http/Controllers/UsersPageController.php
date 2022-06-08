<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersPageController extends Controller
{
    public function __invoke()
    {
        $users = User::orderBy('id', 'ASC')->paginate(3);

        return view('users', [ 'users' => $users ]);
    }
}
