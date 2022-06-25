<?php

namespace App\Http\Controllers;

use App\Models\Task;

class AccountPageController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return view('account.index', [ 'user' => $user ]);
    }
}
