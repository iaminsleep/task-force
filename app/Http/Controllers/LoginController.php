<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\LoginUser;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginUser $service) {
        if($service->execute($request->only('email', 'password'))) {
            return redirect(route('browse'));
        } else {
            return redirect()->back()
                ->withErrors(['auth-error' => 'Email или пароль введены некорректно'])
                ->withInput();
        };
    }
}
