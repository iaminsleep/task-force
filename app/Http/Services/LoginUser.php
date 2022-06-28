<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class LoginUser {
  public function execute(array $data) {
    if(!Auth::attempt($data)) {
      return redirect()->back()
        ->withErrors(['auth-error' => 'Email или пароль введены некорректно'])
        ->withInput();
    };
  }
}
