<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Services\RegisterUser;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterUser $service) {
        $user = $service->execute($request->validated());

        return redirect(route('browse.page'));
    }
}
