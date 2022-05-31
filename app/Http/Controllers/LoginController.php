<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\LoginUser;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginUser $service) {
        $service->execute($request->only('email', 'password'));
        
        return redirect(route('browse.page'));
    }
}
